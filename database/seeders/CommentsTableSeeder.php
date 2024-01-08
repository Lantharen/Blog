<?php

namespace Database\Seeders;


use App\Models\Comment;
use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Comment::factory()->count(7)->create();
    }
}
