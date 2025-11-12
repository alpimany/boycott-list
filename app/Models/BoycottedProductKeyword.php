<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class BoycottedProductKeyword extends Model
{
    /**
     * @use HasFactory<\Database\Factories\BoycottedProductKeywordFactory>
     */
    use HasFactory;

    protected $fillable = ['label'];
}
