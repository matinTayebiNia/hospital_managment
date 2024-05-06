<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class BedRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->method() == "post" ?
            Gate::allows('create-bed') :
            Gate::allows('update-bed');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            "status" => ["required"],
            "image" => ["nullable", "image", "mimes:jpeg,png,jpg,gif,svg", "max:2048"],
            'bed_no' => ["required", "numeric"],
            'in_use' => ["boolean"],
            'name' => ['required', 'string', 'max:255'],
            "bed_type_id" => ["required", "numeric"],
            "room_id" => ["required", "numeric"],
        ];
    }
}
