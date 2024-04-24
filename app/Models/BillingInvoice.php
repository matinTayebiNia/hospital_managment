<?php

namespace App\Models;

use App\Http\HttpHelper\Interfaces\UpdatableAndCreatableInterface;
use App\Http\HttpHelper\Traits\UpdatableAndCreatableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BillingInvoice extends Model implements UpdatableAndCreatableInterface
{
    use HasFactory, UpdatableAndCreatableTrait;

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

    public function billingTransactions(): HasMany
    {
        return $this->hasMany(BillingTransaction::class);
    }

    public function billingInvoiceDetails(): HasMany
    {
        return $this->hasMany(BillingInvoiceDetail::class);
    }
}
