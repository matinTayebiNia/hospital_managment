<?php

namespace App\Models;

use App\Http\HttpHelper\Traits\UpdatableAndCreatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Patient extends Model
{
    use HasFactory, UpdatableAndCreatable;

    protected $fillable = [
        "registration_no",
        "registration_date",
        "referral",
        "referred_by",
        "patient_type",
        "title",
        "name",
        "age",
        "dob",
        "gender",
        "marital_status",
        "blood_group",
        "email",
        "phone",
        "religion",
        "occupation",
        "country",
        "home_phone",
        "father_name",
        "mother_name",
        "father_phone",
        "mother_phone",
        "home_address",
        "father_address",
        "mother_address",
        "next_to_kin_phone",
        "next_to_kin_email",
        "next_to_kin_address",
        "payment_method",
        "symptoms",
        "same_a_patient",
        "image",
        "user_id",
        "created_by_id",
        "updated_by_id",
    ];

    public function doctor(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
