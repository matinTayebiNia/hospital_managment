<?php

namespace App\Helper\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class Helper
{

    /**
     * @param mixed $request
     * @param string $inputName
     * @return string|null
     */
    public static function storeAndGetImagePath(mixed $request, string $inputName = "image"): ?string
    {
        $imagePath = null;

        if ($request->hasFile($inputName)) {

            $year = Carbon::now()->year;
            $month = Carbon::now()->month;
            $day = Carbon::now()->day;
            $path = $year . '/' . $month . "/" . $day;
            Storage::disk("public")->put($path, $request->image);
            $imagePath = $path . "/" . $request->image;

        }
        return $imagePath;
    }

}
