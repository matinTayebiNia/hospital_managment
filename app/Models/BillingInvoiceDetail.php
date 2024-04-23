<?php

namespace App\Models;

use App\Http\HttpHelper\Interfaces\UpdatableAndCreatableInterface;
use App\Http\HttpHelper\Traits\UpdatableAndCreatableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BillingInvoiceDetail extends Model implements UpdatableAndCreatableInterface
{
    use HasFactory, UpdatableAndCreatableTrait;

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
