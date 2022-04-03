<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // @note `php artisan passport:client --public` の代わりです
        DB::table('oauth_clients')->insert([
            'user_id' => 1,
            'name' => 'demo',
            'redirect' => 'http://localhost:3000/auth/callback',
            'personal_access_client' => 0,
            'password_client' => 0,
            'revoked' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        User::create([
            'name' => 'demo',
            'email' => 'demo@example.com',
            'password' => bcrypt('demo@demo'),
        ]);
    }
}
