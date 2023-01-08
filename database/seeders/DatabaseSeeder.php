<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use App\Models\User;
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
        // \App\Models\User::factory(5)->create();
        $user = User::factory()->create([
            'name' => 'josh done',
            'department' => 'computer',
            'email' => 'josh@gmail.com'
        ]);
        Post::factory(6)->create([
            'user_id' => $user->id
        ]);

        // Post::create([
        //     'student_name' => 'Laravel Senior Developer', 
        //     'student_number' => 'laravel, javascript',
        //     'department' => 'Acme Corp',
        //     'email' => 'email1@email.com',
        //     'tags' => 'laravel, javascript',
        //     'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et illo reprehenderit quas possimus voluptas repudiandae cum expedita, eveniet aliquid, quam illum quaerat consequatur! Expedita ab consectetur tenetur delensiti?'
        // ]);

        // Post::create([
        //     'student_name' => 'Full-Stack Engineer',
        //     'student_number' => 'laravel, backend ,api',
        //     'department' => 'Stark Industries',
        //     'email' => 'email2@email.com',
        //     'tags' => 'laravel, backend ,api',
        //     'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et illo reprehenderit quas possimus voluptas repudiandae cum expedita, eveniet aliquid, quam illum quaerat consequatur! Expedita ab consectetur tenetur delensiti?'
        // ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
