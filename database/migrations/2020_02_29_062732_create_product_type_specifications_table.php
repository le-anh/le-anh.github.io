<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTypeSpecificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_type_specifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('product_type_id');
            $table->text('image_link')->nullable($value = true);
            $table->float('net_weight')->nullable($value = true)->comment("Unit: gram");
            $table->text('description')->nullable($value = true);
            $table->boolean('show')->nullable($value = true)->defaultvalue(True);
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
        Schema::dropIfExists('product_type_specifications');
    }
}
