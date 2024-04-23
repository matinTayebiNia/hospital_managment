<?php

namespace App\Models;

use App\Http\HttpHelper\Traits\UpdatableAndCreatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RoomType extends Model
{
    use HasFactory, UpdatableAndCreatable;

    protected $fillable = [
        "code",
        "name",
        "status",
        "created_by_id",
        "updated_by_id"
    ];

    public function rooms(): HasMany
    {
        return $this->hasMany(Room::class);
    }
}
