<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HospitalSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "website",
        "phone",
        "fax",
        "country",
        "address",
        "establish",
        "email",
        "logo",
        "favicon",
        "size",
        "type",
        "facebook",
        "twitter",
        "whatsApp",
        "instagram",
        "driver",
        "encryption",
        "host",
        "port",
        "username",
        "email_form",
        "email_form_name",
        "invoice_prefix",
        "invoice_log",
        "user_prefix",
        "patient_prefix",
        "patient_prefix",
        "invoice_number_mood",
        "invoice_test_number",
        "taxes",
        "discount",
    ];
}
