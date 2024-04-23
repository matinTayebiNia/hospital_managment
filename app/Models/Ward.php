<?php

namespace App\Models;

use App\Http\HttpHelper\Traits\UpdatableAndCreatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    use HasFactory,UpdatableAndCreatable;

    protected $fillable = [
        "name",
        "code",
        "status"
    ];

}
