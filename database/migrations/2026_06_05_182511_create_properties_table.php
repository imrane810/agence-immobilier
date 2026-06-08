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

            $table->enum('type', ['villa', 'appartment', 'house','studio'])
                  ->default('appartment');
            $table->integer('surface_area')->nullable();

            $table->integer('rooms')->nullable();
            $table->integer('bedrooms')->nullable();
            $table->integer('bathrooms')->nullable();

            $table->boolean('furnished')->default(false);

            $table->string('address')->nullable();
            $table->string('city')->nullable();

            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();

            $table->enum('availability_status', ['available', 'rented', 'reserved'])
                  ->default('available');

            $table->string('image')->nullable();
            
            $table->integer('floor')->nullable();
            $table->boolean('has_elevator')->default(false);
            $table->boolean('has_parking')->default(false);

            $table->decimal('security_deposit', 10, 2)->nullable();
            // $table->date('created_at')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};