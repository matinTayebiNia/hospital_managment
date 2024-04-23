<?php

namespace App\Models;

use App\Http\HttpHelper\Interfaces\UpdatableAndCreatableInterface;
use App\Http\HttpHelper\Traits\UpdatableAndCreatableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ChequeDetail extends Model implements UpdatableAndCreatableInterface
{
    use HasFactory, UpdatableAndCreatableTrait;

    protected $fillable = [
        "number",
        "date",
        "billing_transaction_id",
        "status",
        "created_by_id",
        "updated_by_id"
    ];

    public function billingTransaction(): BelongsTo
    {
        return $this->belongsTo(BillingTransaction::class);
    }
}
