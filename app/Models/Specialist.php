<?php

namespace App\Models;

use App\Http\HttpHelper\Interfaces\UpdatableAndCreatableInterface;
use App\Http\HttpHelper\Traits\UpdatableAndCreatableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Specialist extends Model implements UpdatableAndCreatableInterface
{
    use HasFactory, UpdatableAndCreatableTrait;

    protected $fillable = [
        "name",
        "code",
        "status",
        "created_by_id",
        "updated_by_id"
    ];

    public function doctors(): HasMany
    {
        return $this->hasMany(Doctor::class);
    }

    public function nurses(): HasMany
    {
        return $this->hasMany(Nurse::class);
    }

}
