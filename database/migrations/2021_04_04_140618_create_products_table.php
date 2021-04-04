<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('category_id')->constrained('categories');
            $table->string('product_name');
            $table->string('product_code')->nullable();
            $table->string('buying_price')->nullable();
            $table->string('selling_price');
            $table->foreignId('supplier_id')->constrained('suppliers')->nullable();
            $table->string('buying_date')->nullable();
            $table->string('product_quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
