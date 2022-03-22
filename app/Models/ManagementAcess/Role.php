<?php

namespace App\Models\ManagementAcess;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    // use HasFactory;
    use SoftDeletes;

     //Declare Table
     public $table = 'role';
 
     //This Field must type date yyyy-mm-dd hh:mm:ss
     protected $dates = [
         'created_at',
         'updated_at',
         'deleted_at',
     ];

    //Declare Fillable
     protected $fillable = [
         'title',
         'created_at',
         'updated_at',
         'deleted_at', 
     ];
}
