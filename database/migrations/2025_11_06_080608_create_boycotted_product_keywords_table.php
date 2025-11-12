<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('boycotted_product_keywords', function (Blueprint $table) {
            $table->id();
            $table->string('label');
            $table->foreignId('product_id')
                ->constrained('boycotted_products')
                ->cascadeOnDelete();
            $table->timestamps();
        });
    }
};
