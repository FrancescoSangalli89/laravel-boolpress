<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('it-IT');
        for ($i=0; $i < 10; $i++) { 
            $newPost = new Post();
            $newPost->title = $faker->sentence();
            $newPost->content = $faker->paragraph();
            $newPost->slug = $faker->bothify('?????-#####');
            $newPost->save();
        }
    }
}
