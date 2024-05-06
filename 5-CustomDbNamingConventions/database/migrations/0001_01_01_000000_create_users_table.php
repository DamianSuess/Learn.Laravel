<?php

use App\Common\CustomBlueprint;
use Illuminate\Database\Migrations\Migration;
// use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    /*
    // Doesn't work
    ////Schema::blueprintResolver(function ($table, $callback) {
    ////  return new CustomBlueprint($table, $callback);
    ////});

    Schema::create('User', function (CustomBlueprint $table) {
      $table->id();
      $table->string('Name');
      $table->string('Email')->unique();
      $table->timestamp('EmailVerifiedAt')->nullable();
      $table->string('Password');
      $table->rememberToken();
      $table->timestamps();
    });
    */

    $schema = DB::connection()->getSchemaBuilder();
    $schema->blueprintResolver(function ($table, $callback) {
      return new CustomBlueprint($table, $callback);
    });

    $schema->create("User", function (CustomBlueprint $table) {
      $table->id();
      $table->string('Name');
      $table->string('Email')->unique();
      $table->timestamp('EmailVerifiedAt')->nullable();
      $table->string('Password');
      $table->rememberToken();
      $table->timestamps();
    });

    $schema->create('PasswordResetTokens', function (CustomBlueprint $table) {
      $table->string('Email')->primary();
      $table->string('Token');
      $table->timestamp('CreatedAt')->nullable();
    });

    $schema->create('Sessions', function (CustomBlueprint $table) {
      $table->string('Id')->primary();
      $table->foreignId('UserId')->nullable()->index();
      $table->string('IpAddress', 45)->nullable();
      $table->text('UserAgent')->nullable();
      $table->longText('Payload');
      $table->integer('LastActivity')->index();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('Users');
    Schema::dropIfExists('PasswordResetTokens');
    Schema::dropIfExists('Sessions');
  }
};
