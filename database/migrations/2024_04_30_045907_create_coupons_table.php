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
        Schema::create('coupons', function (Blueprint $table) {
            $table->increments('coupon_id');
            $table->string('unique_code', 20)->unique();
            $table->integer('purchase_id')->unsigned();
            $table->timestamp('generation_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->foreign('purchase_id')->references('purchase_id')->on('purchases');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
