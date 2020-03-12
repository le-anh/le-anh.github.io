<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImageActivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_actives', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('image_categories_id');
            $table->text('image_link');
            $table->text('title');
            $table->text('descriptions');
            $table->unsignedTinyInteger('order');
            $table->boolean('show')->defaultvalue(True);
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
        Schema::dropIfExists('image_actives');
    }
}
