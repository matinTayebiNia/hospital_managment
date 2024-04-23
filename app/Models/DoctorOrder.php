<?php

namespace App\Models;

use App\Http\HttpHelper\Interfaces\UpdatableAndCreatableInterface;
use App\Http\HttpHelper\Traits\UpdatableAndCreatableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DoctorOrder extends Model implements UpdatableAndCreatableInterface
{
    use HasFactory, UpdatableAndCreatableTrait;

    protected $fillable = [
        "order_no",
        "order_type",
        "patient_visit_id",
        "user_id",
        "approved_by_id",
        "created_by_id",
        "updated_by_id"
    ];

    public function patientVisit(): BelongsTo
    {
        return $this->belongsTo(PatientVisit::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function approvedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, "approved_by_id", "id");
    }


}
