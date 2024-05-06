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
    $schema = PascalBlueprint::GetSchema();

    $schema->create('Cache', function (PascalBlueprint $table) {
      $table->string('Key')->primary();
      $table->mediumText('Value');
      $table->integer('Expiration');
    });

    $schema->create('CacheLocks', function (PascalBlueprint $table) {
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
