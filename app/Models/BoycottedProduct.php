<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\BoycottedProductFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class BoycottedProduct extends Model
{
    /**
     * @use HasFactory<BoycottedProductFactory>
     */
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * @return BelongsTo<BoycottedCompany, $this>
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(BoycottedCompany::class, foreignKey: 'boycotted_company_id');
    }

    /**
     * @return BelongsToMany<AlternativeProduct, $this>
     */
    public function replacements(): BelongsToMany
    {
        return $this->belongsToMany(
            AlternativeProduct::class,
            'alternative_product_boycotted_product',
        );
    }

    /**
     * @return HasMany<BoycottedProductKeyword, $this>
     */
    public function keywords(): HasMany
    {
        return $this->hasMany(
            BoycottedProductKeyword::class,
            'product_id',
        );
    }
}
