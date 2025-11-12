<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('boycotted_companies', function (Blueprint $table): void {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->string('location');
            $table->text('description');
            // $table->smallInteger('impact_level');
            $table->timestamps();
        });

        Schema::table('boycotted_products', function (Blueprint $table): void {
            $table->foreignId('boycotted_company_id')->constrained();
        });
    }
};
