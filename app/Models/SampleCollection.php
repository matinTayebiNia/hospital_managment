<?php

namespace App\Models;

use App\Http\HttpHelper\Traits\UpdatableAndCreatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SampleCollection extends Model
{
    use HasFactory,UpdatableAndCreatable;

    protected $fillable = [
        "sample_code",
        "collect_date",
        "dispatch_date",
        "cancel_dispatch_date",
        "status",
        "investigation_id",
        "laboratories_id",
        "approved_by_id",
        "created_by_id",
        "updated_by_id",
    ];

    public function investigation(): BelongsTo
    {
        return $this->belongsTo(Investigation::class);
    }

    public function laboratory(): BelongsTo
    {
        return $this->belongsTo(Laboratories::class);
    }

    public function ApprovedBy(): BelongsTo
    {
        return $this->belongsTo(User::class,"approved_by_id","id");
    }
}
