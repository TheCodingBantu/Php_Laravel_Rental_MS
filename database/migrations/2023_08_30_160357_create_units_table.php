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
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('unit_number');
            $table->integer('property_id');
            $table->boolean('is_for_sale')->default(0);
            $table->integer('price');
            $table->integer('bedrooms');
            $table->integer('bathrooms');
            $table->boolean('has_parking')->default(0);
            $table->string('status'); //can be open, occupied, or closed
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('units');
    }
};
