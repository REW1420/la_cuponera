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
        Schema::create('offers', function (Blueprint $table) {
            $table->increments('offer_id');
            $table->string('title', 255);
            $table->decimal('regular_price', 10, 2);
            $table->decimal('offer_price', 10, 2);
            $table->date('start_date');
            $table->date('end_date');
            $table->date('coupon_usage_limit_date');
            $table->integer('coupon_limit_quantity');
            $table->text('description');
            $table->text('other_details');
            $table->string('status', 50)->default('Pending approval');
            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')->references('company_id')->on('offerer_companies');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};
