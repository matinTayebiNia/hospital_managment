<?php

namespace App\Models;

use App\Http\HttpHelper\Interfaces\UpdatableAndCreatableInterface;
use App\Http\HttpHelper\Traits\UpdatableAndCreatableTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static Builder search(mixed $search)
 * @property string $image
 */
class Bed extends Model implements UpdatableAndCreatableInterface
{
    use HasFactory, UpdatableAndCreatableTrait;

    protected $fillable = [
        "status",
        "bed_no",
        "in_use",
        "name",
        "image",
        "bed_type_id",
        "room_id",
        "created_by_id",
        "updated_by_id"
    ];

    public function bedType(): BelongsTo
    {
        return $this->belongsTo(BedType::class);
    }

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }

    public function scopeSearch(Builder $query, $value = null): Builder
    {
        return is_null($value) ? $query : $query->where("name", "LIKE", "%{$value}%")
            ->orWhere("bed_no", "LIKE", "%{$value}%");
    }
}
