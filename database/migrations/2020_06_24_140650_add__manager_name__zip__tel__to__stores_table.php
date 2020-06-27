
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;


class AddManagerNameZipTelToStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stores', function (Blueprint $table) {
            DB::statement('DELETE FROM stores');
            $table->string('manager_name');
            $table->unsignedBigInteger('zip');
            $table->unsignedBigInteger('tel');
            $table->string('prefectural');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stores', function (Blueprint $table) {
            $table->dropColumn('manager_name');
            $table->dropColumn('zip');
            $table->dropColumn('tel');
            $table->dropColumn('prefectural');
        });
    }
}
