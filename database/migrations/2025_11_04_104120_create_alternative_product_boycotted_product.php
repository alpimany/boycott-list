<?php

declare(strict_types=1);

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
        Schema::create('alternative_product_boycotted_product', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('boycotted_product_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->foreignId('alternative_product_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boycotted_products_alternatives');
    }
};
