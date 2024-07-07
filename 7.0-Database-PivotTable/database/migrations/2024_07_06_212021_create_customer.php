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
    // TODO: Rename, customer
    Schema::create('customers', function (Blueprint $table) {
      $table->id();
      $table->string("name");
      $table->timestamps();
    });

    // TODO: Rename, products -> product
    Schema::create("flights", function (Blueprint $table) {
      $table->id();
      $table->string("name");
      $table->string("airline");
      $table->timestamps();
    });

    // Using a custom pivot table name `tickets`. Laravel default: `customer_flight`
    // TODO: Rename, invoices -> invoice
    Schema::create("tickets", function (Blueprint $table) {
      $table->id();
      $table->string("customer_id");
      $table->string("flight_id");
      $table->primary(["customer_id", "flight_id"]);
      $table->timestamps();
      // $table->string("seat");  // TODO: Rename, 'discount'
    });

    //
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('customer');
  }
};
