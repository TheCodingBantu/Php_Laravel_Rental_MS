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
        Schema::create('tenants', function (Blueprint $table) {
            $table->id();
            $table->string('tenant_name');
            $table->string('tenant_phone');
            $table->string('email');
            $table->integer('unit_id');
            $table->string('status');
            $table->string('address');
            $table->datetime('rent_due_date');
            $table->datetime('date_of_entry');
            $table->integer('national_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenants');
    }
};
