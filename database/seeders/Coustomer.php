<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Coustomer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trip_customer')->insert([
            'name' => 'Adarsh Kumar Verma',
            'email' => 'anshi1010@gmail.com',
            'phone' => '6386098744',
            'password' => Hash::make('12345')
        ]);
    }
}
