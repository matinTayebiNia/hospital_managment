<?php

namespace App\Models;

use App\Http\HttpHelper\Interfaces\UpdatableAndCreatableInterface;
use App\Http\HttpHelper\Traits\UpdatableAndCreatableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Immunization extends Model implements UpdatableAndCreatableInterface
{
    use HasFactory, UpdatableAndCreatableTrait;

    protected $fillable = [
        "name",
        "patient_id",
        "patient_visit_id",
        "user_id",
        "created_by_id",
        "updated_by_id"
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
}
