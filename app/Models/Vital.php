<?php

namespace App\Models;

use App\Http\HttpHelper\Traits\UpdatableAndCreatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vital extends Model
{
    use HasFactory,UpdatableAndCreatable;

    protected $fillable = [
        "systolic_B_P",
        "diastolic_B_P",
        "temperature",
        "weight",
        "height",
        "bmi",
        "respiratory",
        "heart_rate",
        "urine_output",
        "blood_sugar_f",
        "blood_sugar_r",
        "spo_2",
        "avpu",
        "trauma",
        "mobility",
        "oxygen_supplementation",
        "comment",
        "created_by_id",
        "updated_by_id",
        "patient_id",
        "patient_visit_id",
        "user_id",
        "medicine_id"
    ];


    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    public function patientVisit(): BelongsTo
    {
        return $this->belongsTo(PatientVisit::class);
    }

    public function doctor(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function medicine(): BelongsTo
    {
        return $this->belongsTo(Medicine::class);
    }


}
