<?php

namespace Database\Seeders;

use App\Models\MasterData\TypeUser;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class TypeUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type_user = [
            [
                'name' => 'Admin',
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                'name' => 'Dokter',
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                'name' => 'Pasien',
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
        ];

        //Running Insert To Table From Array
        TypeUser::insert($type_user);
    }
}
