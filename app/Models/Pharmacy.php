<?php

namespace App\Models;

use App\Http\HttpHelper\Interfaces\UpdatableAndCreatableInterface;
use App\Http\HttpHelper\Traits\UpdatableAndCreatableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pharmacy extends Model implements UpdatableAndCreatableInterface
{
    use HasFactory, UpdatableAndCreatableTrait;

    protected $fillable = [
        "code",
        "name",
        "email",
        "phone",
        "address",
        "branch_id",
        "created_by_id",
        "updated_by_id",
    ];

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }
}
