<?php

namespace App\Models;

use App\Http\HttpHelper\Traits\UpdatableAndCreatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    use HasFactory, UpdatableAndCreatable;

    protected $fillable = [
        "operations_date",
        "operations_time",
        "amount",
        "description",
        "description_type_id",
        "patient_id",
        "user_id",
        "status",
        "created_by_id",
        "updated_by_id",
    ];
}
