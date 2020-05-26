<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_attributes', function (Blueprint $table) {
            $table->id();            
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('specification_id');
            $table->unsignedBigInteger('attribute_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('specification_id')->references('id')->on('specification_headers')->onDelete('cascade');
            $table->foreign('attribute_id')->references('id')->on('attributes')->onDelete('cascade');
            $table->text('value');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('update_by');
            $table->foreign('created_by')->references('id')->on('admins');
            $table->foreign('update_by')->references('id')->on('admins');
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
        Schema::dropIfExists('product_attributes');
    }
}
