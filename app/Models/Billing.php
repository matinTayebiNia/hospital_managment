<?php

namespace App\Models;

use App\Http\HttpHelper\Traits\UpdatableAndCreatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Billing extends Model
{
    use HasFactory, UpdatableAndCreatable;

    protected $fillable = [
        "status",
        "doctor_order_id",
        "patient_visit_id",
        "created_by_id",
        "updated_by_id"
    ];

    public function doctorOrder(): BelongsTo
    {
        return $this->belongsTo(DoctorOrder::class);
    }

    public function patientVisit(): BelongsTo
    {
        return $this->belongsTo(PatientVisit::class);
    }
}
