<?php

namespace App\Models;

use App\Http\HttpHelper\Traits\UpdatableAndCreatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory, UpdatableAndCreatable;

    protected $fillable = [
        "about_doctor",
        "charge",
        "experience",
        "specialist_id",
        "user_id",
        "created_by_id",
        "updated_by_id"
    ];
}
