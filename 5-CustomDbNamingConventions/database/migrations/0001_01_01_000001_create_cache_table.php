<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('Cache', function (Blueprint $table) {
      $table->string('Key')->primary();
      $table->mediumText('Value');
      $table->integer('Expiration');
    });

    Schema::create('CacheLocks', function (Blueprint $table) {
      $table->string('Key')->primary();
      $table->string('Owner');
      $table->integer('Expiration');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('Cache');
    Schema::dropIfExists('CacheLocks');
  }
};
