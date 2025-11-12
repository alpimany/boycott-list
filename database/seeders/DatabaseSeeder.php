<?php

declare(strict_types=1);

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\AlternativeProduct;
use App\Models\BoycottedCompany;
use App\Models\BoycottedProduct;
use App\Models\BoycottedProductKeyword;
use App\Models\User;
use Illuminate\Database\Seeder;

final class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->create([
            'name' => 'Alpimany',
            'email' => 'test@example.com',
            'password' => 'password',
        ]);



        BoycottedCompany::factory()
            ->has(
                BoycottedProduct::factory()->count(random_int(20, 50))
                    ->hasAttached(
                        AlternativeProduct::factory()->count(rand(1, 5)),
                        [],
                        'replacements'
                    )
                    ->has(
                        BoycottedProductKeyword::factory()->count(random_int(1, 5)),
                        'keywords'
                    ),
                'products'
            )
            ->count(random_int(20, 100))
            ->create();
    }
}
