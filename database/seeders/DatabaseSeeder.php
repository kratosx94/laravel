<?php

namespace Database\Seeders;
use App\Models\Category;
use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // using truncate to stop showing error when seeding a unique item
        User::truncate();
        Post::truncate();
        Category::truncate();

        Post::factory(50)->create();




        // seeding the db with default users
//         $user = User::factory()->create();

//        // seeding the db with default categories
//        $personal = Category::create([
//            'name'=>'Personal',
//            'slug'=>'personal'
//        ]);
//
//         $family = Category::create([
//             'name'=>'Family',
//             'slug'=>'family'
//         ]);
//         $work = Category::create([
//             'name'=>'Work',
//             'slug'=>'work'
//         ]);
//
//         // seeding the db with default posts
//        Post::create([
//            'user_id' => $user->id,
//            'category_id' =>$family->id,
//            'title'=>'my family post',
//            'slug'=>'my first post',
//            'excerpt'=>'lorem ipsum dolar sit amet',
//            'body' =>'lorem ipsum dolar sit amet concestuer elite morbi viverra'
//        ]);
//
//        Post::create([
//            'user_id' => $user->id,
//            'category_id' =>$family->id,
//            'title'=>'my family post',
//            'slug'=>'my second  post',
//            'excerpt'=>'lorem ipsum dolar sit amet',
//            'body' =>'lorem ipsum dolar sit amet concestuer elite morbi viverra'
//        ]);
//
//
//        Post::create([
//            'user_id' => $user->id,
//            'category_id' =>$family->id,
//            'title'=>'my family post',
//            'slug'=>'my third post',
//            'excerpt'=>'lorem ipsum dolar sit amet',
//            'body' =>'lorem ipsum dolar sit amet concestuer elite morbi viverra'
//        ]);
    }
}
