<?php

namespace App\Models;

use App\Http\HttpHelper\Interfaces\UpdatableAndCreatableInterface;
use App\Http\HttpHelper\Traits\UpdatableAndCreatableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Medicine extends Model implements UpdatableAndCreatableInterface
{
    use HasFactory, UpdatableAndCreatableTrait;

    protected $fillable = [
        "medicine_code",
        "medicine_name",
        "medicine_price",
        "description",
        "available_qty",
        "alert_qty",
        "status",
        "purchase_id",
        "created_by_id",
        "updated_by_id"
    ];

    public function purchase(): BelongsTo
    {
        return $this->belongsTo(Purchase::class);
    }
}
