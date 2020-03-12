<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGreenBeanCoffeeImportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('green_bean_coffee_imports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code', 100);
            $table->date('date_created')->nullable($value = True);
            $table->bigInteger('supplier_id');
            $table->bigInteger('total')->nullable($value = True);
            $table->bigInteger('payment')->nullable($value = True);
            $table->bigInteger('due')->nullable($value = True);
            $table->tinyInteger('status')->nullable($value = True)->default(2);
            $table->text('note')->nullable($value = True);
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
        Schema::dropIfExists('green_bean_coffee_imports');
    }
}
