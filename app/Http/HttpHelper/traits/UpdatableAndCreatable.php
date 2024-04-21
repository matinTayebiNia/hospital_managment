<?php

namespace App\Http\HttpHelper\traits;

use Illuminate\Support\Facades\Auth;

trait UpdatableAndCreatable
{
    //
    //
    //
    public static function bootCreatable()
    {
        if (Auth::check()) {
            self::creating(function ($model)  {
                $model->created_by_id = Auth::user()->id;
            });

            self::updating(function ($model)  {
                $model->updated_by_id = Auth::user()->id;
            });
        }
    }


}
