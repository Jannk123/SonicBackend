<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'Test Student',
            'email' => 'test@sonic.de',
            'password' => bcrypt('password'),
        ]);

        Video::create([
            'user_id' => $user->id,
            'title' => 'Einführung in Vue.js',
            'channel_name' => 'WebDev Channel',
            'thumbnail' => 'img/placeholder-image.jpg',
            'accuracy' => 95,
            'views' => '1.2K Aufrufe'
        ]);

        Video::create([
            'user_id' => $user->id,
            'title' => 'Laravel REST API Tutorial',
            'channel_name' => 'Backend Master',
            'thumbnail' => 'img/placeholder-image.jpg',
            'accuracy' => 88,
            'views' => '850 Aufrufe'
        ]);

        Video::create([
            'user_id' => $user->id,
            'title' => 'CSS Flexbox leicht gemacht',
            'channel_name' => 'Design Guru',
            'thumbnail' => 'img/placeholder-image.jpg',
            'accuracy' => 92,
            'views' => '3.1K Aufrufe'
        ]);
    }
}