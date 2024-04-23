<?php

namespace App\Models;

use App\Http\HttpHelper\Traits\UpdatableAndCreatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodRequest extends Model
{
    use HasFactory, UpdatableAndCreatable;

    protected $fillable = [
        "reason",
        "blood_type",
        "unit",
        "status",
        "patient_id",
        "created_by_id",
        "updated_by_id"
    ];
}
