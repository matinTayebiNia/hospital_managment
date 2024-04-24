<?php

namespace App\Models;

use App\Http\HttpHelper\Interfaces\UpdatableAndCreatableInterface;
use App\Http\HttpHelper\Traits\UpdatableAndCreatableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PatientVisit extends Model implements UpdatableAndCreatableInterface
{
    use HasFactory, UpdatableAndCreatableTrait;

    protected $fillable = [
        "visit_no",
        "visit_status",
        "visit_type",
        "description",
        "visit_date",
        "patient_id",
        "user_id",
        "created_by_id",
        "updated_by_id",
    ];

    public function allergies(): HasMany
    {
        return $this->hasMany(Allergy::class);
    }

    public function billings(): HasMany
    {
        return $this->hasMany(Billing::class);
    }

    public function immunizations(): HasMany
    {
        return $this->hasMany(Immunization::class);
    }

    public function billingTransactions(): HasMany
    {
        return $this->hasMany(BillingTransaction::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    public function investigations(): HasMany
    {
        return $this->hasMany(Investigation::class);
    }

    public function medicalCertificates(): HasMany
    {
        return $this->hasMany(MedicalCertificate::class);
    }

    public function prescriptions(): HasMany
    {
        return $this->hasMany(Prescription::class);
    }

    public function presentingComplains(): HasMany
    {
        return $this->hasMany(PresentingComplain::class);
    }

    public function vitals(): HasMany
    {
        return $this->hasMany(Vital::class);
    }
}
