<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(20)->create();  //u sustini 20 puta kreiraj fabriku i kreiraj usera
       
        //primer:
        //User::factory()
        //->count(20)
        //->create();
    }
}
