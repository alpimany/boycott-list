<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\BoycottedCompanyFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class BoycottedCompany extends Model
{
    /** @use HasFactory<BoycottedCompanyFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
        'image',
        'description',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * @return HasMany<BoycottedProduct, $this>
     */
    public function products(): HasMany
    {
        return $this->hasMany(BoycottedProduct::class);
    }
}
