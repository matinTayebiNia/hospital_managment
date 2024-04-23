<?php

namespace App\Models;

use App\Http\HttpHelper\Traits\UpdatableAndCreatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChequeDetail extends Model
{
    use HasFactory, UpdatableAndCreatable;

    protected $fillable = [
        "number",
        "date",
        "billing_transaction_id",
        "status",
        "created_by_id",
        "updated_by_id"
    ];
}
