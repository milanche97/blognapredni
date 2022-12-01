<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    $tags =[
        'Blogging', 
        'Freelancing', 
        'How to Succeed', 
        'Internet Marketing', 
        'Miscellaneous',
    ];
    $tags = array_map(
        fn(string $tag) => ['name'=>$tag],
        $tags
    );
    Tag::insert($tags);  //za dodavanje u bazu kao "instert into table"

    Post::inRandomOrder()
    ->take(50)
    ->get()
    ->each(
        function (Post $post) {
            $tagsId = Tag::inRandomOrder()->take(rand(1,3))->get('id');
            $post->tags()->attach($tagsId);
        }
    );
    }
}
