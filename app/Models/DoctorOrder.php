<?php

namespace App\Models;

use App\Http\HttpHelper\Traits\UpdatableAndCreatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorOrder extends Model
{
    use HasFactory, UpdatableAndCreatable;

    protected $fillable = [
        "order_no",
        "order_type",
        "patient_visit_id",
        "user_id",
        "approved_by_id",
        "created_by_id",
        "updated_by_id"
    ];
}
