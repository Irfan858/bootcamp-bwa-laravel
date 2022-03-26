<?php

namespace Database\Seeders;

use App\Models\MasterData\Consultation;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ConsultationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //Creata Data
         $consultation = [
            [
                "name" => 'Jantung Sesak',
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "name" => 'Tekanan Darah Tinggi',
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "name" => 'Gangguan Irama Jantung',
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
        ];

        //Running Insert To Table From Array
        Consultation::insert($consultation);
    }
}
