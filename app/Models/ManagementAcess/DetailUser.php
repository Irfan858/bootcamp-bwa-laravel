<?php

namespace App\Models\ManagementAcess;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailUser extends Model
{
    //use HasFactory;
    use SoftDeletes;

    //Declare Table
    public $table = 'detail_user';

    //This Field must type date yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    //Declare Fillable
    protected $fillable = [
        'user_id',
        'type_user_id',
        'contact',
        'address',
        'photo',
        'gender',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

        //Menerima Relasi Dari Tabel type_user
        public function type_user()
        {
        return $this->belongsTo('App\Models\MasterData\TypeUser', 'type_user_id', 'id');
        }

        //Menerima Relasi Dari tabel user
        public function user()
        {
            return $this->belongsTo('App\Models\User','user_id','id');
        }
}
