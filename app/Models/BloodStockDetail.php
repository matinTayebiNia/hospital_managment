<?php

namespace App\Models;

use App\Http\HttpHelper\Interfaces\UpdatableAndCreatableInterface;
use App\Http\HttpHelper\Traits\UpdatableAndCreatableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BloodStockDetail extends Model implements UpdatableAndCreatableInterface
{
    use HasFactory, UpdatableAndCreatableTrait;

    protected $fillable = [
        "unit",
        "total",
        "balance",
        "blood_stock_id",
        "created_by_id",
        "updated_by_id"
    ];

    public function bloodStuck(): BelongsTo
    {
        return $this->belongsTo(BloodStock::class);
    }
}
