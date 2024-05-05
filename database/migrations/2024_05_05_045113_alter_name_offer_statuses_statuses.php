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
        Schema::rename('offer_statuses', 'statuses');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename('statuses', 'offer_statuses');
    }

};
