<?php

namespace App\Models;

use App\Http\HttpHelper\Traits\UpdatableAndCreatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BillingInvoiceDetail extends Model
{
    use HasFactory, UpdatableAndCreatable;

    protected $fillable = [
        "item_amount",
        "item_total_amount",
        "billing_invoice_id",
        "created_by_id",
        "updated_by_id"
    ];

    public function billingInvoice(): BelongsTo
    {
        return $this->belongsTo(BillingInvoice::class);
    }
}
