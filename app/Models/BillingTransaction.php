<?php

namespace App\Models;

use App\Http\HttpHelper\Traits\UpdatableAndCreatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillingTransaction extends Model
{
    use HasFactory, UpdatableAndCreatable;

    protected $fillable = [
        "payment_amount",
        "mood",
        "status",
        "patient_visit_id",
        "billing_invoice_id",
        "created_by_id",
        "updated_by_id"
    ];
}
