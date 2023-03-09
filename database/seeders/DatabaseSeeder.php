<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    

        User::create([
            'name' => 'Diannita',
            'username' => 'diannita',
            'email' => 'dianita@gmail.com',
            'password' => bcrypt('54321')
        ]);

        User::factory(3)->create();
        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);
        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design',
        ]);
        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        Post::factory(10)->create();

        // Post::create([
        //     'title' => 'Why',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque cupiditate, illo quia necessitatibus consequuntur',
        //     'body' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque cupiditate, illo quia necessitatibus consequuntur ex dolor excepturi porro sequi enim! Velit magni molestias expedita sapiente ducimus aperiam officia dolores quasi quibusdam numquam, veritatis ut quisquam blanditiis voluptates autem enim voluptatum beatae placeat, dignissimos laborum unde quod hic, eaque quos. Sunt?',
        //     'category_id' => 1,
        //     'user_id' => 1        
        // ]);
        // Post::create([
        //     'title' => 'Who',
        //     'slug' => 'judul-kedua',
        //     'excerpt' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque cupiditate, illo quia necessitatibus consequuntur',
        //     'body' => '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque cupiditate, illo quia necessitatibus consequuntur ex dolor excepturi porro sequi enim! Velit magni molestias expedita sapiente ducimus aperiam officia dolores quasi quibusdam numquam, veritatis ut quisquam blanditiis voluptates autem enim voluptatum beatae placeat, dignissimos laborum unde quod hic, eaque quos. Sunt?</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, sit molestias. Expedita natus cum quae officia assumenda delectus sapiente nemo iusto placeat doloribus. Dicta quaerat nemo itaque saepe et, placeat alias quasi repellendus consectetur ut neque corporis atque voluptatibus, adipisci veniam voluptatum ullam, expedita quam eius impedit numquam sed facere?</p>',
        //     'category_id' => 1,
        //     'user_id' => 1        
        // ]);
        // Post::create([
        //     'title' => 'When',
        //     'slug' => 'judul-ketiga',
        //     'excerpt' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque cupiditate, illo quia necessitatibus consequuntur',
        //     'body' => '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque cupiditate, illo quia necessitatibus consequuntur ex dolor excepturi porro sequi enim! Velit magni molestias expedita sapiente ducimus aperiam officia dolores quasi quibusdam numquam, veritatis ut quisquam blanditiis voluptates autem enim voluptatum beatae placeat, dignissimos laborum unde quod hic, eaque quos. Sunt?</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, sit molestias. Expedita natus cum quae officia assumenda delectus sapiente nemo iusto placeat doloribus. Dicta quaerat nemo itaque saepe et, placeat alias quasi repellendus consectetur ut neque corporis atque voluptatibus, adipisci veniam voluptatum ullam, expedita quam eius impedit numquam sed facere?</p>',
        //     'category_id' => 2,
        //     'user_id' => 1        
        // ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
