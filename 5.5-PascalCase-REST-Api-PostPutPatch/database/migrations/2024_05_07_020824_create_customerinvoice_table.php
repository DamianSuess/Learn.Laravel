<?php

use App\Common\PascalBlueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    $schema = PascalBlueprint::GetSchema();

    $schema->create("Customer", function (PascalBlueprint $table) {
      $table->id("Id");
      $table->string("Name");
      $table->integer("CustomerTypeId");
      $table->string("Email");
      $table->string("Address");
      $table->string("City");
      $table->string("State");
      $table->string("Country");
      $table->string("PostalCode");
      $table->timestamps();
    });

    $schema->create("Invoice", function (PascalBlueprint $table) {
      $table->id("Id");
      $table->integer("CustomerId");    // TODO (2024-05-11 DJS): Make Eloquent use "CustomerId" (see, InvoiceFactory.php)
      $table->double("Amount");         // TODO (2024-04-28 DJS): Change to "0.0000" precision
      $table->string("PaidStatusId");   // 1 = Billed, 2 = Paid, 3 = Void
      $table->dateTime("BilledDttm");
      $table->dateTime("PaidDttm")->nullable();
      $table->timestamps();

      $table->foreign("CustomerId", "FK_InvoiceCustomerId_CustomerId")->references("Id")->on("Customer");
    });

    $schema->create("CustomerType", function (PascalBlueprint $table) {
      $table->id("Id");
      $table->string("Name");
    });

    DB::table("CustomerType")->insert(array("Id" => 1, "Name" => "Billed"));
    DB::table("CustomerType")->insert(array("Id" => 2, "Name" => "Paid"));
    DB::table("CustomerType")->insert(array("Id" => 3, "Name" => "Void"));
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists("Customer");
    Schema::dropIfExists("Invoice");
  }
};
