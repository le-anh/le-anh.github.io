<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGreenBeanCoffeeImportDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('green_bean_coffee_import_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('green_bean_coffee_import_id');
            $table->bigInteger('product_type_specification_id');
            $table->bigInteger('unit_id');
            $table->bigInteger('price');
            $table->bigInteger('quantity');
            $table->bigInteger('total');
            $table->softDeletes();
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
        Schema::dropIfExists('green_bean_coffee_import_details');
    }
}
