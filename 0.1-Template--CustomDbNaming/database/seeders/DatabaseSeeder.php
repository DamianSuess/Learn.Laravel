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
    // Remember:
    //  1. YOU MUST define the table name in the Model, or else it will pluralize the SQL call.
    //  2. Model, User, extends BaseUser and BaseModel. Otherwise you'll have the following issue.
    //     * Issue: Eloquent still tries to use `updated_at` and `created_at`, not our `UpdatedAt/CreatedAt` columns.
    //     * Error: SQLSTATE[HY000]: General error: 1 table User has no column named updated_at (Connection: sqlite, SQL: insert into "User" ("Name", "Email", "EmailVerifiedAt", "Password", "RememberToken", "updated_at", "created_at") values (Test User, test@example.com, 2024-05-12 20:46:49, $2y$12$0BCYlSvX55UYDdoVoUqmPumm.CaPo9AD4EFmX4hXC9/hceQ.1w78O, FEfuIRshHl, 2024-05-12 20:46:50, 2024-05-12 20:46:50))
    //
    // Sample to create 10 users: `User::factory(10)->create();`
    User::factory()->create([
      'Name' => 'Test User',
      'Email' => 'test@example.com',
    ]);
  }
}
