<?php

namespace App\Models\ManagementAcess;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    //use HasFactory;
    use SoftDeletes;

     //Declare Table
     public $table = 'permission';

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

   // many to many
   public function role()
   {
       return $this->belongsToMany('App\Models\ManagementAccess\Role');
   }

   // one to many
   public function permission_role()
   {
       // 2 parameter (path model, field foreign key)
       return $this->hasMany('App\Models\ManagementAccess\PermissionRole', 'permission_id');
   }
}
