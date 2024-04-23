<?php

namespace App\Http\HttpHelper\Interfaces;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

interface UpdatableAndCreatableInterface
{
    public function createdBy(): BelongsTo;

    public function updatedBy(): BelongsTo;
}
