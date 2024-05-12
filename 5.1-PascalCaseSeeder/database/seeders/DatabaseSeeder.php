<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    $this->call(
      [CustomerSeeder::class]
    );

    // User::factory(10)->create();

    // This still attempts to use table, `users` and not `User`
    ////User::factory()->create([
    ////  'name' => 'Test User',
    ////  'email' => 'test@example.com',
    ////]);
  }
}
