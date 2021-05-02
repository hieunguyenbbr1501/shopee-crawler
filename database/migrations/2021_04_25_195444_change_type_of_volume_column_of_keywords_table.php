<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeTypeOfVolumeColumnOfKeywordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('keywords', function (Blueprint $table) {
            $table->integer('volume')->nullable()->after('price')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('keywords', function (Blueprint $table) {
            $table->string('volume')->nullable()->after('price')->change();
        });
    }
}
