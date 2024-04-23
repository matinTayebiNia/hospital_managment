<?php

namespace App\Models;

use App\Http\HttpHelper\Traits\UpdatableAndCreatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BedType extends Model
{
    use HasFactory, UpdatableAndCreatable;

    protected $fillable = [
        "status",
        "code",
        "name",
        "created_by_id",
        "updated_by_id"
    ];
}
