<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post; 
use App\Models\User; 

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userIds = User::pluck('id');

        Post::factory()
            ->count(50) 
            ->sequence(fn () => [
                
                'user_id' => $userIds->random(),
            ])
            ->create();
    }
}
