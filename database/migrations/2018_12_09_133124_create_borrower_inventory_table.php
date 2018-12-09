<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBorrowerInventoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrower_inventory', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('qty');
            $table->dateTime('brrwdate');
            $table->dateTime('rtndate');
            $table->string('status');
            $table->integer('user_id');
            $table->integer('borrower_id');
            $table->integer('inventory_id');
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
        Schema::dropIfExists('borrower_inventory');
    }
}
