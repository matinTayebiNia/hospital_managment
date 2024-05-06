<?php

namespace App\Models;

use App\Http\HttpHelper\Interfaces\UpdatableAndCreatableInterface;
use App\Http\HttpHelper\Traits\UpdatableAndCreatableTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 *
 * @method static Builder search(string|null $search)
 *
 */
class RoomType extends Model implements UpdatableAndCreatableInterface
{
    use HasFactory, UpdatableAndCreatableTrait;

    protected $fillable = [
        "code",
        "name",
        "status",
        "created_by_id",
        "updated_by_id"
    ];

    public function scopeSearch(Builder $query, string|null $search): Builder
    {
        return empty($search) ? $query : $query->where("name", "LIKE", "%{$search}%")
            ->orWhere("code", "LIKE", "%{$search}%");
    }

    public function rooms(): HasMany
    {
        return $this->hasMany(Room::class);
    }
}
