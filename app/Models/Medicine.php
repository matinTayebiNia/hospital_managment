<?php

namespace App\Models;

use App\Http\HttpHelper\Traits\UpdatableAndCreatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory, UpdatableAndCreatable;

    protected $fillable = [
        "medicine_code",
        "medicine_name",
        "medicine_price",
        "description",
        "available_qty",
        "alert_qty",
        "status",
        "purchase_id",
        "created_by_id",
        "updated_by_id"
    ];
}
