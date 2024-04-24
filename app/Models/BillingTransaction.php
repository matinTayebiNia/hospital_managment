<?php

namespace App\Models;

use App\Http\HttpHelper\Interfaces\UpdatableAndCreatableInterface;
use App\Http\HttpHelper\Traits\UpdatableAndCreatableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BillingTransaction extends Model implements UpdatableAndCreatableInterface
{
    use HasFactory, UpdatableAndCreatableTrait;

    protected $fillable = [
        "payment_amount",
        "mood",
        "status",
        "patient_visit_id",
        "billing_invoice_id",
        "created_by_id",
        "updated_by_id"
    ];

    public function patientVisit(): BelongsTo
    {
        return $this->belongsTo(PatientVisit::class);
    }

    public function billingInvoice(): BelongsTo
    {
        return $this->belongsTo(BillingInvoice::class);
    }

    public function chequeDetails(): HasMany
    {
        return $this->hasMany(ChequeDetail::class);
    }
}
