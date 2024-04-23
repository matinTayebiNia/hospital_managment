<?php

namespace App\Models;

use App\Http\HttpHelper\Traits\UpdatableAndCreatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bed extends Model
{
    use HasFactory, UpdatableAndCreatable;

    protected $fillable = [
        "status",
        "bed_no",
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
}
