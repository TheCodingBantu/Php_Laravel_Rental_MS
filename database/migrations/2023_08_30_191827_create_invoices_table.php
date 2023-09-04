<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->integer('tenant_id');
            $table->integer('unit_id');
            $table->integer('payment_id')->nullable();
            $table->integer('amount');
            $table->datetime('start_date');
            $table->datetime('end_date');
            $table->string('ref_number');
            $table->string('payment_status')->default('PENDING');
            $table->datetime('due_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
