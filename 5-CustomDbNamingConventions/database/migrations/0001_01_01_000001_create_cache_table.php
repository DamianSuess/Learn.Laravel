<?php

use App\Common\CustomBlueprint;
use Illuminate\Database\Migrations\Migration;
// use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
  private function GetSchema()
  {
    $schema = DB::connection()->getSchemaBuilder();
    $schema->blueprintResolver(function ($table, $callback) {
      return new CustomBlueprint($table, $callback);
    });

    return $schema;
  }

  /**
   * Run the migrations.
   */
  public function up(): void
  {
    // Doesn't work
    ////Schema::blueprintResolver(function ($table, $callback) {
    ////  return new CustomBlueprint($table, $callback);
    ////});

    ////$schema = DB::connection()->getSchemaBuilder();
    ////$schema->blueprintResolver(function ($table, $callback) {
    ////  return new CustomBlueprint($table, $callback);
    ////});

    $schema = $this->GetSchema();

    $schema->create('Cache', function (CustomBlueprint $table) {
      $table->string('Key')->primary();
      $table->mediumText('Value');
      $table->integer('Expiration');
    });

    $schema->create('CacheLocks', function (CustomBlueprint $table) {
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
