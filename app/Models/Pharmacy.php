<?php

namespace App\Models;

use App\Http\HttpHelper\Traits\UpdatableAndCreatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
    use HasFactory, UpdatableAndCreatable;

    protected $fillable = [
        "code",
        "name",
        "email",
        "phone",
        "address",
        "branch_id",
        "created_by_id",
        "updated_by_id",
    ];
}
