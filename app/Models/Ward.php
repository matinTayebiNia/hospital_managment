<?php

namespace App\Models;

use App\Http\HttpHelper\Interfaces\UpdatableAndCreatableInterface;
use App\Http\HttpHelper\Traits\UpdatableAndCreatableTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ward extends Model implements UpdatableAndCreatableInterface
{
    use HasFactory, UpdatableAndCreatableTrait;

    protected $fillable = [
        "name",
        "code",
        "status"
    ];

    public function rooms(): HasMany
    {
        return $this->hasMany(Room::class);
    }

    public function scopeSearch(Builder $query, $search = null): Builder
    {
        return empty($search) ? $query : $query
            ->where("name", "LIKE", "%{$search}%")
            ->orWhere("code", "LIKE", "%{$search}%");
    }
}
