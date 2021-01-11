<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImotiModel extends Model
{
    use HasFactory;
    // specify the table, primary key and if not autoincremening make it false
    protected $table = 'imoti';
    protected $primaryKey = 'id';
    protected $guarded = [];  //turns off massasign protection for all or: protected $fillable = ['company_id','name','vorname'...];
    //public $incrementing = false;

    //public $timestamps = false; //By default laravel will expect created_at & updated_at column in your table. By making it to false it will override the default setting.

    /**
         * Get the comments for the blog post.
    */

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
