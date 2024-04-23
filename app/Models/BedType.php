<?php

namespace App\Models;

use App\Http\HttpHelper\Traits\UpdatableAndCreatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BedType extends Model
{
    use HasFactory, UpdatableAndCreatable;

    protected $fillable = [
        "status",
        "code",
        "name",
        "created_by_id",
        "updated_by_id"
    ];

    public function beds(): HasMany
    {
        return $this->hasMany(Bed::class);
    }
}
