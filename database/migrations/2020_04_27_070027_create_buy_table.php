<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buy', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('buy_product_id');
            $table->unsignedBigInteger('buy_user_id');
            $table->datetime('buy_date');
            $table->boolean('delete_flg')->default(false);
            $table->datetime('create_at');
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
        Schema::dropIfExists('buy');
    }
}
