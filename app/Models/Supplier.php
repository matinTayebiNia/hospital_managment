<?php

namespace App\Models;

use App\Http\HttpHelper\Interfaces\UpdatableAndCreatableInterface;
use App\Http\HttpHelper\Traits\UpdatableAndCreatableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Supplier extends Model implements UpdatableAndCreatableInterface
{
    use HasFactory,UpdatableAndCreatableTrait;

    protected $fillable = [
        "name",
        "email",
        "phone",
        "address",
        "company",
        "product",
        "description",
        "status",
        "created_by_id",
        "updated_by_id"
    ];

    public function purchases(): HasMany
    {
        return $this->hasMany(Purchase::class);
    }
}
