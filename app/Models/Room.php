<?php

namespace App\Models;

use App\Http\HttpHelper\Interfaces\UpdatableAndCreatableInterface;
use App\Http\HttpHelper\Traits\UpdatableAndCreatableTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static Builder search(string $search)
 */
class Room extends Model implements UpdatableAndCreatableInterface
{
    use HasFactory, UpdatableAndCreatableTrait;

    protected $fillable = [
        "room_no",
        "name",
        "price",
        "capacity",
        "status",
        "image",
        "ward_id",
        "room_type_id",
        "created_by_id",
        "updated_by_id",
    ];

    public function roomType(): BelongsTo
    {
        return $this->belongsTo(RoomType::class);
    }

    public function ward(): BelongsTo
    {
        return $this->belongsTo(Ward::class);
    }

    public function scopeSearch(Builder $query, $search = ""): Builder
    {
        return empty($search) ? $query :
            $query->where("name", "LIKE", "%{$search}%")
                ->orWhere("room_no", "LIKE", "%{$search}%")
                ->orWhere('price', "LIKE", "%{$search}%")
                ->orWhere("capacity", "LIKE", "%{$search}%")
                ->orWhereHas("ward", function ($q) use ($search) {
                    return $q->where("name", "LIKE", "%{$search}%");
                })->orWhereHas("roomType", function ($q) use ($search) {
                    return $q->where("name", "LIKE", "%{$search}%");
                });
    }


}
