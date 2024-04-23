<?php

namespace App\Models;

use App\Http\HttpHelper\Interfaces\UpdatableAndCreatableInterface;
use App\Http\HttpHelper\Traits\UpdatableAndCreatableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Doctor extends Model implements UpdatableAndCreatableInterface
{
    use HasFactory, UpdatableAndCreatableTrait;

    protected $fillable = [
        "about_doctor",
        "charge",
        "experience",
        "specialist_id",
        "user_id",
        "created_by_id",
        "updated_by_id"
    ];

    public function specialist(): BelongsTo
    {
        return $this->belongsTo(Specialist::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
