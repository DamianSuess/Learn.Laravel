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
    // Doesn't work
    ////Schema::blueprintResolver(function ($table, $callback) {
    ////  return new CustomBlueprint($table, $callback);
    ////});

    $schema = DB::connection()->getSchemaBuilder();
    $schema->blueprintResolver(function ($table, $callback) {
      return new CustomBlueprint($table, $callback);
    });

    $schema->create('Jobs', function (CustomBlueprint $table) {
      $table->id();
      $table->string('Queue')->index();
      $table->longText('Payload');
      $table->unsignedTinyInteger('Attempts');
      $table->unsignedInteger('ReservedAt')->nullable();
      $table->unsignedInteger('AvailableAt');
      $table->unsignedInteger('CreatedAt');
    });

    $schema->create('JobBatches', function (CustomBlueprint $table) {
      $table->string('Id')->primary();
      $table->string('Name');
      $table->integer('TotalJobs');
      $table->integer('PendingJobs');
      $table->integer('FailedJobs');
      $table->longText('FailedJobIds');
      $table->mediumText('Options')->nullable();
      $table->integer('CancelledAt')->nullable();
      $table->integer('CreatedAt');
      $table->integer('FinishedAt')->nullable();
    });

    $schema->create('FailedJobs', function (CustomBlueprint $table) {
      $table->id();
      $table->string('Uuid')->unique();
      $table->text('Connection');
      $table->text('Queue');
      $table->longText('Payload');
      $table->longText('Exception');
      $table->timestamp('FailedAt')->useCurrent();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('Jobs');
    Schema::dropIfExists('JobBatches');
    Schema::dropIfExists('FailedJobs');
  }
};
