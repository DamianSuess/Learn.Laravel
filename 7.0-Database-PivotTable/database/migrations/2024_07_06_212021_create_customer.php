<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('customer', function (Blueprint $table) {
      $table->id();
      $table->string("name");
      $table->timestamps();
    });

    Schema::create("flights", function (Blueprint $table) {
      $table->id();
      $table->string("name");
      $table->string("airline");
      $table->timestamps();
    });

    Schema::create("customer_flight", function (Blueprint $table) {
      $table->id();
      $table->string("customer_id");
      $table->string("flight_id");
      $table->primary(["customer_id", "flight_id"]);
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('customer');
  }
};
