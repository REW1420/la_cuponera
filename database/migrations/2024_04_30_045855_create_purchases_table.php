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
        Schema::create('purchases', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id')->unsigned();
            $table->integer('offer_id')->unsigned();
            $table->timestamp('purchase_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('offer_id')->references('id')->on('offers');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
