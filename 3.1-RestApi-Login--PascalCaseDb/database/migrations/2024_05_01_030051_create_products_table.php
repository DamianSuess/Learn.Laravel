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

    $schema->create("Product", function (PascalBlueprint $table) {

      $table->id();
      $table->string("Name");
      $table->text("Detail");
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('Product');
  }
};
