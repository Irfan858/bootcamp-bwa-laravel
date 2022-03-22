<?php

namespace App\Models\Operational;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    // use HasFactory;
    use SoftDeletes;

     //Declare Table
     public $table = 'appointment';
 
     //This Field must type date yyyy-mm-dd hh:mm:ss
     protected $dates = [
         'created_at',
         'updated_at',
         'deleted_at',
     ];
 
    //Declare Fillable
     protected $fillable = [
         'doctor_id',
         'user_id',
         'consultation_id',
         'level',
         'date',
         'time',
         'status',
         'created_at',
         'updated_at',
         'deleted_at',
     ];

    //Menerima Relasi Dari tabel doctor
    public function doctor()
    {
        return $this->belongsTo('App\Models\ManagementAcess\Appointment','doctor_id','id');
    }

    //Menerima Relasi Dari tabel consultation
    public function consultation()
    {
        return $this->belongsTo('App\Models\MasterData\Consultation', 'consultation_id', 'id');
    }

    //Menerima Relasi Dari tabel user
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }

    //Mengirim Relasi Ke Tabel Transaction (One To One)
    public function transaction()
    {
        return $this->hasOne('App\Models\Operational\Transaction','appointment_id');
    }
}
