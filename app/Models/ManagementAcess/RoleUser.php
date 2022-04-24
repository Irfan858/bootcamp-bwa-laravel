<?php

namespace App\Models\ManagementAcess;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoleUser extends Model
{
    // use HasFactory;
    use SoftDeletes;

    //Declare Table
    public $table = 'role_user';

    //This Field must type date yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

   //Declare Fillable
    protected $fillable = [
        'role_id',
        'user_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

     // one to many
     public function user()
     {
         // 3 parameter (path model, field foreign key, field primary key from table hasMany/hasOne)
         return $this->belongsTo('App\Models\User', 'user_id', 'id');
     }

     public function role()
     {
         // 3 parameter (path model, field foreign key, field primary key from table hasMany/hasOne)
         return $this->belongsTo('App\Models\ManagementAccess\Role', 'role_id', 'id');
     }
}
