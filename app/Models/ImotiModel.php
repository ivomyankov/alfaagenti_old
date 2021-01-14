<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AreaModel;
use App\Models\User;

class ImotiModel extends Model
{
    public $paginateDash = 20;

    use HasFactory;
    // specify the table, primary key and if not autoincremening make it false
    protected $table = 'imoti';
    protected $primaryKey = 'id';
    protected $guarded = [];  //turns off massasign protection for all or: protected $fillable = ['company_id','name','vorname'...];
    //public $incrementing = false;

    //public $timestamps = false; //By default laravel will expect created_at & updated_at column in your table. By making it to false it will override the default setting.

    public function __construct() {
        
    }

    public function area(){
        return $this->hasOne(AreaModel::class, 'id', 'area_id');
    }

    public function agent(){
        return $this->hasOne(User::class, 'id', 'agent_id');
    }
    
    public static function homeImoti($paginate, $visible)
    {     
        $active = ImotiModel::where('status', 'Продажба')
                            ->orWhere('status', 'Наем')
                            ->paginate($paginate, $visible);
        return $active;
    }
    public static function homeImotiProdajba($paginate, $visible)
    {        
        $active = ImotiModel::where('status', 'Продажба')
                            ->paginate($paginate, $visible);
        return $active;
    }

    public static function homeImotiNaem($paginate, $visible)
    {        
        $active = ImotiModel::where('status', 'Наем')
                            ->paginate($paginate, $visible);
        return $active;
    }

    public static function topImoti($visible)
    {        
        $top = ImotiModel::where('top', 1)
                            ->where(function ($query) {
                                $query->where('status', 'Продажба')
                                    ->orWhere('status', 'Наем');
                        })->get($visible);
        return $top;
    }
    
    public static function imoti($dash, $paginate)
    {   if($dash==1){
            $imoti = ImotiModel::paginate($paginate);
        }else{
            $imoti = ImotiModel::where('status', '!=', 'Чернова')->where('top' , 0)->paginate($paginate);
        }     
        
        return $imoti;
    }

    public static function dashImoti($agent){ 
        if($agent == 'admin')
        {
            $imoti = ImotiModel::paginate($this->paginateDash);
        } else { 
            $imoti = ImotiModel::where('agent_id', $agent)->paginate(20); //dd($imoti);
        }        
        return $imoti;
    }

     public function imot($id)
    {
        
        $imot = ImotiModel::find($id);
        return $imot;
    }

    public function agentsImoti($id=0)
    {
        
        $imoti = ImotiModel::where('agent_id', $id)->get();
        return $imoti;
    }

    public function count()
    {        
        return Model::count();
    }
}
