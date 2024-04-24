<?php

namespace App\Models;

use App\Http\HttpHelper\Interfaces\UpdatableAndCreatableInterface;
use App\Http\HttpHelper\Traits\UpdatableAndCreatableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Investigation extends Model implements UpdatableAndCreatableInterface
{
    use HasFactory, UpdatableAndCreatableTrait;

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

    public function sampleCollections(): HasMany
    {
        return $this->hasMany(SampleCollection::class);
    }
}
