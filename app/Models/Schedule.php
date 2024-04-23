<?php

namespace App\Models;

use App\Http\HttpHelper\Traits\UpdatableAndCreatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Schedule extends Model
{
    use HasFactory,UpdatableAndCreatable;

    protected $fillable = [
        "start_time",
        "end_time",
        "status",
        "available_days",
        "note",
        "user_id",
        "created_by_id",
        "updated_by_id"
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
