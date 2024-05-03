<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('offers', function (Blueprint $table) {

            $table->dropColumn('status');
            $table->integer('status_id')->unsigned();



        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('offer_statuses', function (Blueprint $table) {
            $table->dropColumn('status_id');
            $table->integer('status');



        });
    }
};
