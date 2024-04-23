<?php

namespace App\Models;

use App\Http\HttpHelper\Traits\UpdatableAndCreatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientVisit extends Model
{
    use HasFactory, UpdatableAndCreatable;

    protected $fillable = [
        "visit_no",
        "visit_status",
        "visit_type",
        "description",
        "visit_date",
        "patient_id",
        "user_id",
        "created_by_id",
        "updated_by_id",
    ];}
