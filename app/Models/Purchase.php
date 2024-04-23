<?php

namespace App\Models;

use App\Http\HttpHelper\Traits\UpdatableAndCreatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory, UpdatableAndCreatable;

    protected $fillable = [
        "code",
        "name",
        "type",
        "medicine_generic_name",
        "medicine_unit",
        "medicine_strength",
        "medicine_shelf",
        "quantity",
        "quantity_type",
        "price",
        "expiration_date",
        "note",
        "image",
        "status",
        "medicine_type_id",
        "medicine_category_id",
        "supplier_id",
        "created_by_id",
        "updated_by_id"
    ];
}
