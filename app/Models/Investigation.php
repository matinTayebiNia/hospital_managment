<?php

namespace App\Models;

use App\Http\HttpHelper\Traits\UpdatableAndCreatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Investigation extends Model
{
    use HasFactory, UpdatableAndCreatable;

    protected $fillable = [
        "statistic",
        "ot_required",
        "result",
        "status",
        "test_type_id",
        "patient_id",
        "patient_visit_id",
        "user_id",
        "created_by_id",
        "updated_by_id"
    ];

    public function testType(): BelongsTo
    {
        return $this->belongsTo(TestType::class);
    }

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
}
