<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TypeUser extends Model
{
    // use HasFactory;
    use SoftDeletes;

    //Declare Table
    public $table = 'type_user';
 
    //This Field must type date yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

   //Declare Fillable
    protected $fillable = [
        'name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    //Mengirimkan Relasi Ke Tabel detail_user (One To Many)
    public function detail_user()
    {
        
        return $this->hasMany('App\Models\ManagementAcess\DetailUser','type_user_id');
    }
}
