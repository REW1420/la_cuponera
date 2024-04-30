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
        Schema::create('offerer_companies', function (Blueprint $table) {
            $table->increments('company_id');
            $table->string('name', 255);
            $table->string('code', 6)->unique();
            $table->string('address', 255);
            $table->string('contact_name', 100);
            $table->string('phone', 20);
            $table->string('email', 100);
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('category_id')->on('categories');
            $table->decimal('commission', 5, 2);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offerer_companies');
    }
};
