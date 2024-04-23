<?php

namespace App\Models;

use App\Http\HttpHelper\Traits\UpdatableAndCreatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory,UpdatableAndCreatable;

    protected $fillable=[
        "room_no",
        "name",
        "price",
        "capacity",
        "status",
        "image",
        "ward_id",
        "room_type_id",
        "created_by_id",
        "updated_by_id",
    ];



}
