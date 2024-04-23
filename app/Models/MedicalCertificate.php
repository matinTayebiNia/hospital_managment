<?php

namespace App\Models;

use App\Http\HttpHelper\Traits\UpdatableAndCreatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalCertificate extends Model
{
    use HasFactory, UpdatableAndCreatable;

    protected $fillable = [
        "content",
        "finalized",
        "status",
        "patient_id",
        "patient_visit_id",
        "user_id",
        "status",
        "created_by_id",
        "updated_by_id"
    ];
}
