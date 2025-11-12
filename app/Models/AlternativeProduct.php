<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\AlternativeProductFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class AlternativeProduct extends Model
{
    /** @use HasFactory<AlternativeProductFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
