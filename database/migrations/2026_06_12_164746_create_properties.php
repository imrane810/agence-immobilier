<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->text('description')->nullable();

            $table->decimal('price_per_day', 10, 2);

            $table->enum('type', [
                'villa',
                'apartment',
                'house',
                'studio'
            ]);

            $table->string('city');
            $table->string('address');

            $table->unsignedInteger('rooms')->default(1);

            $table->string('main_image')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};