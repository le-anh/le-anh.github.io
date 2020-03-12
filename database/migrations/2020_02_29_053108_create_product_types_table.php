<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('image_link')->nullable($value = true);
            $table->text('name');
            $table->text('ingredient')->nullable($value = true);
            $table->text('use_manual')->nullable($value = true);
            $table->tinyInteger('use_periord')->nullable($value = true)->comment('Unit: Month');
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
        Schema::dropIfExists('product_types');
    }
}
