<?php

namespace Database\Seeders;

use App\Models\MasterData\Specialist;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class SpecialistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Creata Data
        $specialist = [
            [
                "name" => 'Dermatology',
                "price" => '250000',
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
                
            ],
            [
                "name" => 'Dentist',
                "price" => '450000',
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
                
            ],
            [
                "name" => 'Endodontics',
                "price" => '150000',
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
                
            ],
            [
                "name" => 'General Dentistry',
                "price" => '120000',
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
                
            ],
            [
                "name" => 'Oral and Maxillofacial Surgery',
                "price" => '80000',
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "name" => 'Orthodontics',
                "price" => '900000',
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
                
            ],
            [
                "name" => 'Pediatric Dentistry',
                "price" => '300000',
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
                
            ],
            [
                "name" => 'Periodontics',
                "price" => '250000',
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
                
            ],
            [
                "name" => 'Prosthodontics',
                "price" => '250000',
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
                
            ],
            [
                "name" => 'Radiology',
                "price" => '250000',
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
                
            ],
            [
                "name" => 'Surgery',
                "price" => '250000',
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
                
            ],
            [
                "name" => 'Urology',
                "price" => '250000',
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
                
            ],
        ];

        //Running Insert To Table From Array
        Specialist::insert($specialist);
    }
}
