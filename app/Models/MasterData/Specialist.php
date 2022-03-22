<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Specialist extends Model
{
    use HasFactory;
    use SoftDeletes;

    //Declare Table
    public $table = 'specialist';
 
    //This Field must type date yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

   //Declare Fillable
    protected $fillable = [
        'name',
        'price',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    //Mengirimkan Relasi Ke Tabel Doctor (One To Many)
    public function doctor()
    {
        
        return $this->hasMany('App\Models\ManagementAcess\Doctor','specialist_id');
    }
}
