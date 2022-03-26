<?php

namespace Database\Seeders;

use App\Models\MasterData\ConfigPayment;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ConfigPaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Creata Data
        $config_payment = [
            [
                "fee" => '150000',
                "vat" => '20',
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
        ];
        
        //Running Insert To Table From Array
        ConfigPayment::insert($config_payment);
    }
}
