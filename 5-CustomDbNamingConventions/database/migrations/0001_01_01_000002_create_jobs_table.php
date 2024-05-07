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

    $schema->create('Jobs', function (PascalBlueprint $table) {
      $table->id();
      $table->string('Queue')->index();
      $table->longText('Payload');
      $table->unsignedTinyInteger('Attempts');
      $table->unsignedInteger('ReservedAt')->nullable();
      $table->unsignedInteger('AvailableAt');
      $table->unsignedInteger('CreatedAt');
    });

    $schema->create('JobBatches', function (PascalBlueprint $table) {
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

    $schema->create('FailedJobs', function (PascalBlueprint $table) {
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
