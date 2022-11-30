<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::all()->each(
            function (User $user) {
                $posts = Post::factory(5)->create(['user_id'=>$user->id]);     //pri svakom pozivuy fabrike uzece ono sto smo poslali i spojice sa onim sto je navedeno 
                $user ->posts()->saveMany($posts);    //dodace user id i kreirace post sa tim podacima, nacin da spolja kazemo koja ce vrednost biti nekog polja
                
                //primer:
                //User::factory(20);
                //->hasPosts(5);
                //->create();
    }   
);
}
}