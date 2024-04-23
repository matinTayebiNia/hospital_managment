<?php

namespace App\Models;

use App\Http\HttpHelper\Interfaces\UpdatableAndCreatableInterface;
use App\Http\HttpHelper\Traits\UpdatableAndCreatableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Purchase extends Model implements UpdatableAndCreatableInterface
{
    use HasFactory, UpdatableAndCreatableTrait;

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

    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }

    public function medicineType(): BelongsTo
    {
        return $this->belongsTo(MedicineType::class);
    }

    public function medicineCategory(): BelongsTo
    {
        return $this->belongsTo(MedicineCategory::class);
    }
}
