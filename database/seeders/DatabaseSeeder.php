<?php

namespace Database\Seeders;

use App\Models\Borrower;
use App\Models\Inventory;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed a local database with a test admin and sample records.
     * Never run this on production.
     */
    public function run(): void
    {
        $admin = User::factory()->create([
            'name' => 'Test Admin',
            'email' => 'admin@example.com',
        ]); // password: "password" (see UserFactory)

        $ball = Inventory::create(['item' => 'Football', 'location' => 'Store A']);
        Inventory::create(['item' => 'Badminton racket', 'location' => 'Store B']);

        $borrower = new Borrower;
        $borrower->name = 'Sample Borrower';
        $borrower->phonenum = '0120000000';
        $borrower->position = 'Student';
        $borrower->inventoriy_id = $ball->id;
        $borrower->user_id = $admin->id;
        $borrower->save();
    }
}
