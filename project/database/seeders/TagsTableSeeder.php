<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $tags = collect( ['Laravel', 'Slim', 'Bugs', 'Help', 'Foundation']);
        $tags->each(function($t){
            Tag::create([
                'name' => $t,
                'slug' => \Str::slug($t)
            ]);
        });

    }
}
