<?php

namespace App\Models\ManagementAcess;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PermissionRole extends Model
{
    // use HasFactory;
    use SoftDeletes;

         //Declare Table
         public $table = 'permission_role';

         //This Field must type date yyyy-mm-dd hh:mm:ss
         protected $dates = [
             'created_at',
             'updated_at',
             'deleted_at'
         ];

         //Declare Fillable
         protected $fillable = [
             'permission_id',
             'role_id',
             'created_at',
             'updated_at',
             'deleted_at'
         ];

    // one to many
    public function permission()
    {
        // 3 parameter (path model, field foreign key, field primary key from table hasMany/hasOne)
        return $this->belongsTo('App\Models\ManagementAccess\Permission', 'permission_id', 'id');
    }

    public function role()
    {
        // 3 parameter (path model, field foreign key, field primary key from table hasMany/hasOne)
        return $this->belongsTo('App\Models\ManagementAccess\Role', 'role_id', 'id');
    }
}
