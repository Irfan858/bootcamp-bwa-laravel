<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    // use HasFactory;
    //Declare Table
    public $table = 'consultation';
 
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

    //Mengirimkan Relasi Ke Tabel Appointment (One To Many)
    public function appointment()
    {
        return $this->hasMany('App\Model\Operational\Appointment', 'consultation_id');
    }
}
