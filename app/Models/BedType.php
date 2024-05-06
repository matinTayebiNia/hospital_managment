<?php

namespace App\Models;

use App\Http\HttpHelper\Interfaces\UpdatableAndCreatableInterface;
use App\Http\HttpHelper\Traits\UpdatableAndCreatableTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static Builder search(mixed $search)
 */
class BedType extends Model implements UpdatableAndCreatableInterface
{
    use HasFactory, UpdatableAndCreatableTrait;

    protected $fillable = [
        "status",
        "code",
        "name",
        "created_by_id",
        "updated_by_id"
    ];

    public function scopeSearch(Builder $query, $search = ""): Builder
    {
        return empty($search) ? $query : $query->where("name", "LIKE", "%{$search}%")
            ->orWhere("code", "LIKE", "%{$search}%");
    }

    public function beds(): HasMany
    {
        return $this->hasMany(Bed::class);
    }
}
