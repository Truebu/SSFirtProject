<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->insert([
           [
               'name'=>'Juan',
               'email'=>'Juan@gmail.com',
               'password'=>'1234',
               'creationUser'=> Carbon::now()
           ],
            [
                'name'=>'Pepito',
                'email'=>'Pepito@gmail.com',
                'password'=>'1234',
                'creationUser'=> Carbon::now()
            ]
        ]);
    }
}
