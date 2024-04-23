<?php

namespace App\Models;

use App\Http\HttpHelper\Traits\UpdatableAndCreatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabTest extends Model
{
    use HasFactory, UpdatableAndCreatable;

    protected $fillable = [
        "name",
        "price",
        "percentage",
        "created_by_id",
        "updated_by_id"
    ];
}
