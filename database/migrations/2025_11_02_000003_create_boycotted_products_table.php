<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('boycotted_products', function (Blueprint $table): void {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->string('description');
            $table->json('alternatives')->nullable();
            $table->timestamps();
        });
    }
};
