<?php

namespace App\Models;

use App\Http\HttpHelper\Interfaces\UpdatableAndCreatableInterface;
use App\Http\HttpHelper\Traits\UpdatableAndCreatableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Patient extends Model implements UpdatableAndCreatableInterface
{
    use HasFactory, UpdatableAndCreatableTrait;

    protected $fillable = [
        "registration_no",
        "registration_date",
        "referral",
        "referred_by",
        "patient_type",
        "title",
        "name",
        "age",
        "dob",
        "gender",
        "marital_status",
        "blood_group",
        "email",
        "phone",
        "religion",
        "occupation",
        "country",
        "home_phone",
        "father_name",
        "mother_name",
        "father_phone",
        "mother_phone",
        "home_address",
        "father_address",
        "mother_address",
        "next_to_kin_phone",
        "next_to_kin_email",
        "next_to_kin_address",
        "payment_method",
        "symptoms",
        "same_a_patient",
        "image",
        "user_id",
        "created_by_id",
        "updated_by_id",
    ];

    public function doctor(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function allergies(): HasMany
    {
        return $this->hasMany(Allergy::class);
    }

    public function bloodBanks(): HasMany
    {
        return $this->hasMany(BloodBank::class);
    }

    public function bloodRequests(): HasMany
    {
        return $this->hasMany(BloodRequest::class);
    }

    public function immunizations(): HasMany
    {
        return $this->hasMany(Immunization::class);
    }

    public function investigations(): HasMany
    {
        return $this->hasMany(Investigation::class);
    }

    public function medicalCertificates(): HasMany
    {
        return $this->hasMany(MedicalCertificate::class);
    }

    public function operations(): HasMany
    {
        return $this->hasMany(Operation::class);
    }

    public function patientVisits(): HasMany
    {
        return $this->hasMany(PatientVisit::class);
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
