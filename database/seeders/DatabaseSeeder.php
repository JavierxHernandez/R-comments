<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Reply;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         $users = \App\Models\User::factory(10)
             ->hasComments(3)
             ->create();

         $comments = \App\Models\Comment::get();

         foreach ($comments as $comment) {
             Reply::factory(rand(1,3))->create([
                 'comment_id' => $comment->id,
                 'user_id' => rand(1,10),
             ]);
         }
    }
}
