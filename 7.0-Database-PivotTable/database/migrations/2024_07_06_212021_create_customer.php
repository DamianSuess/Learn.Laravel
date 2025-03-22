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
    // Customer
    // Invoice
    // Product
    // InvoiceItems (invoice_product)     - many-to-many
    // CustomerInvoice (customer_invoice) - one-to-many or many-to-many?

    // TODO: Create, customer table

    // TODO: Rename, invoices -> invoice
    Schema::create('invoices', function (Blueprint $table) {
      $table->id();
      $table->string("name");
      $table->timestamps();
    });

    // TODO: Rename, products -> product
    Schema::create("products", function (Blueprint $table) {
      $table->id();
      $table->string("name");
      $table->string("brand");
      $table->timestamps();
    });

    // Using a custom pivot table name `tickets`. Laravel default: `invoice_product`
    // TODO: Rename, to something better
    Schema::create("invoiceitems", function (Blueprint $table) {
      $table->string("invoice_id");
      $table->string("product_id");
      $table->primary(["invoice_id", "product_id"]);
      $table->timestamps();

      // Additional columns
      $table->string("coupon")->nullable();

      // Foreign keys
      //$table->foreign("invoice_id")->references("id")->on("invoices");
      //$table->foreign("product_id")->references("id")->on("products");
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
