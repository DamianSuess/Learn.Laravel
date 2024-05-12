<?php

use App\Common\PascalBlueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

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
    ////  return new PascalBlueprint($table, $callback);
    ////});

    Schema::create('User', function (PascalBlueprint $table) {
      $table->id();
      $table->string('Name');
      $table->string('Email')->unique();
      $table->timestamp('EmailVerifiedAt')->nullable();
      $table->string('Password');
      $table->rememberToken();
      $table->timestamps();
    });
    */

    $schema = PascalBlueprint::GetSchema();

    $schema->create("User", function (PascalBlueprint $table) {
      $table->id();
      $table->string('Name');
      $table->string('Email')->unique();
      $table->timestamp('EmailVerifiedAt')->nullable();
      $table->string('Password');
      $table->rememberToken();
      $table->timestamps();
    });

    $schema->create('PasswordResetTokens', function (PascalBlueprint $table) {
      $table->string('Email')->primary();
      $table->string('Token');
      $table->timestamp('CreatedAt')->nullable();
    });

    // NOTE! The column names here are HARDCODED!
    $schema->create('Sessions', function (PascalBlueprint $table) {
      $table->string('id')->primary();
      $table->foreignId('user_id')->nullable()->index();
      $table->string('ip_address', 45)->nullable();
      $table->text('user_agent')->nullable();
      $table->longText('Payload');
      $table->integer('last_activity')->index();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('User');
    Schema::dropIfExists('PasswordResetTokens');
    Schema::dropIfExists('Sessions');
  }
};
