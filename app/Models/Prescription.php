<?php

namespace App\Models;

use App\Http\HttpHelper\Traits\UpdatableAndCreatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
