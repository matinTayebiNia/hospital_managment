<?php

namespace App\Models;

use App\Http\HttpHelper\Interfaces\UpdatableAndCreatableInterface;
use App\Http\HttpHelper\Traits\UpdatableAndCreatableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Branch extends Model implements UpdatableAndCreatableInterface
{

    use HasFactory, UpdatableAndCreatableTrait;

    protected $fillable = [
        "name",
        "address",
        "phone",
        "email",
        "website",
        "status",
        "created_by_id",
        "updated_by_id"
    ];

    public function pharmacies(): HasMany
    {
        return $this->hasMany(Pharmacy::class);
    }
}
