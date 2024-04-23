<?php

namespace App\Models;

use App\Http\HttpHelper\Interfaces\UpdatableAndCreatableInterface;
use App\Http\HttpHelper\Traits\UpdatableAndCreatableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BloodStock extends Model implements UpdatableAndCreatableInterface
{
    use HasFactory, UpdatableAndCreatableTrait;

    protected $fillable = [
        "blood_bank_id",
        "created_by_id",
        "updated_by_id"
    ];

    public function bloodBank(): BelongsTo
    {
        return $this->belongsTo(BloodBank::class);
    }
}
