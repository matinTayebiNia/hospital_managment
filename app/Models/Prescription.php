<?php

namespace App\Models;

use App\Http\HttpHelper\Traits\UpdatableAndCreatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Prescription extends Model
{
    use HasFactory, UpdatableAndCreatable;

    protected $fillable = [
        "dosage",
        "frequency",
        "duration",
        "food_relation",
        "route",
        "instruction",
        "status",
        "patient_id",
        "patient_visit_id",
        "user_id",
        "medicine_id",
        "created_by_id",
        "updated_by_id",
    ];

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    public function patientVisit(): BelongsTo
    {
     return $this->belongsTo(PatientVisit::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function medicine(): BelongsTo
    {
        return $this->belongsTo(Medicine::class);
    }
}
