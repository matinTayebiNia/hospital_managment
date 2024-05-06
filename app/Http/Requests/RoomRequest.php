<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class RoomRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->method() == "post" ?
            Gate::allows("create-room")
            : Gate::allows("edit-room");
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "room_no" => ["required", "numeric"],
            "name" => ["required", "string", "max:225"],
            "price" => ["required", "numeric"],
            "capacity" => ["required", "numeric"],
            "status" => ["required", "numeric", Rule::in(["0", "1"])],
            "image" => ["nullable", "image", "mimes:jpeg,png,jpg,gif,svg", "max:2048"],
            "ward_id" => ["required", "numeric"],
            "room_type_id" => ["required", "numeric"],
        ];
    }
}
