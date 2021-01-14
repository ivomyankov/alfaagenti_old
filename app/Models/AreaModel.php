<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ImotiModel;

class AreaModel extends Model
{
    use HasFactory;
    // specify the table, primary key and if not autoincremening make it false
    protected $table = 'area';
    protected $primaryKey = 'id';
    protected $guarded = [];  //turns off massasign protection for all or: protected $fillable = ['company_id','name','vorname'...];
    public $timestamps = false; //By default laravel will expect created_at & updated_at column in your table. By making it to false it will override the default setting.

    
}
