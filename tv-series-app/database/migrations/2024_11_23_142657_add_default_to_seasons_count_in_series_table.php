<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('series', function (Blueprint $table) {
            $table->integer('seasons_count')->default(0)->change();
        });
    }

    public function down()
    {
        Schema::table('series', function (Blueprint $table) {
            $table->integer('seasons_count')->nullable()->change();
        });
    }
};
