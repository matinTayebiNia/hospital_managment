<?php


use App\Helper\Services\Constant;
use Illuminate\Support\Facades\Route;
use JetBrains\PhpStorm\ArrayShape;
use Spatie\Permission\Models\Role;

if (!function_exists("isActive")) {
    function isActive(array|string $name, string $class): string
    {
        if (is_array($name)) {
            return in_array(Route::current()->getName(), $name) ? $class : "";
        }

        return $name == Route::current()->getName() ? $class : "";

    }
}

if (!function_exists("getStatus")) {
    #[ArrayShape(["0" => "string", "1" => "string"])]
    function getStatus(): array
    {
        return ["0" => "غیر فعال", "1" => "فعال"];
    }
}

if (!function_exists("getRoles")) {
    function getRoles()
    {
        return Role::where("name", "!=", "patient")->latest()->get(['id', 'name', "as_name"]);
    }
}
if (!function_exists("getStatusDataModel")) {
    function getStatusDataModel(string $status): string
    {
        return match ($status) {
            "0" => "غیر فعال",
            "1" => "فعال"
        };
    }
}

if (!function_exists("getStatus")) {
    #[ArrayShape(['' => "string", '1' => "string", '0' => "string"])]
    function getStatus(): array
    {
        return [
            '' => 'انتخاب کنید',
            '1' => 'فعال',
            '0' => 'غیر فعال',
        ];
    }
}


if (!function_exists("getPerPageNumber")) {
    function getPerPageNumber(): array
    {
        return Constant::PAGINATE_NUMBERS_AND_WORD;
    }
}
