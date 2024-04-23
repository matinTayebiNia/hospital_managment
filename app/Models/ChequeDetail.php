<?php

namespace App\Models;

use App\Http\HttpHelper\Traits\UpdatableAndCreatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ChequeDetail extends Model
{
    use HasFactory, UpdatableAndCreatable;

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
