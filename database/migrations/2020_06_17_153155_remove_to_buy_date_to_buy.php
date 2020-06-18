<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveToBuyDateToBuy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('buy', function (Blueprint $table) {
            DB::statement('DELETE FROM buy');
            $table->dropColumn('buy_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('buy', function (Blueprint $table) {
            $table->datetime('buy_date');
    });
}

}