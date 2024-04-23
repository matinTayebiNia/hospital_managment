<?php

namespace App\Models;

use App\Http\HttpHelper\Interfaces\UpdatableAndCreatableInterface;
use App\Http\HttpHelper\Traits\UpdatableAndCreatableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Operation extends Model implements UpdatableAndCreatableInterface
{
    use HasFactory, UpdatableAndCreatableTrait;

    protected $fillable = [
        "operations_date",
        "operations_time",
        "amount",
        "description",
        "operation_type_id",
        "patient_id",
        "user_id",
        "status",
        "created_by_id",
        "updated_by_id",
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function operationType(): BelongsTo
    {
        return $this->belongsTo(OperationType::class);
    }

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }
}
