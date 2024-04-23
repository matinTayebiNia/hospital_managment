<?php

namespace App\Http\HttpHelper\Traits;

use Illuminate\Support\Facades\Auth;

trait UpdatableAndCreatable
{
    //
    //
    //
    public static function bootCreatable()
    {
        if (Auth::check()) {
            static::creating(function ($model)  {
                $model->created_by_id = Auth::user()->id;
            });

            static::updating(function ($model)  {
                $model->updated_by_id = Auth::user()->id;
            });
        }
    }


}
