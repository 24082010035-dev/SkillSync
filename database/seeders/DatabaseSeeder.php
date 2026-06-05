<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // user dummy (boleh dihapus kalau tidak perlu)
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // panggil seeder lain
        $this->call([
            TestSeeder::class,
        ]);
        $this->call([
    TestSeeder::class,
    SyncPathQuestionSeeder::class,
]);
    }
}