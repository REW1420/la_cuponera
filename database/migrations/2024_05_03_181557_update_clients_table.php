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
        Schema::table('clients', function (Blueprint $table) {

            $table->dropColumn(['name', 'email']);


            $table->string('dui', 100)->unique()->after('id');
            $table->integer('user_id')->unsigned();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('clients', function (Blueprint $table) {

            $table->string('name');
            $table->string('email');


            $table->dropColumn('dui');
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }

};
