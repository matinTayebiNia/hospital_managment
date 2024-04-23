<?php

namespace App\Models;

use App\Http\HttpHelper\Traits\UpdatableAndCreatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BillingInvoice extends Model
{
    use HasFactory, UpdatableAndCreatable;

    protected $fillable = [
        "invoice_number",
        "total",
        "pending_amount",
        "payment_amount",
        "note",
        "mood",
        "discount_type",
        "discount_amount",
        "discount_note",
        "tax",
        "additional_fee",
        "status",
        "billing_invoice_id",
        "created_by_id",
        "updated_by_id"
    ];

    public function billingInvoice(): BelongsTo
    {
        return $this->belongsTo(BillingInvoice::class);
    }
}
