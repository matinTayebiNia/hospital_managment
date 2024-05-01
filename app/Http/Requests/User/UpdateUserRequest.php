<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Gate::allows("update-user");
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            "gender" => ["required", "string", Rule::in(["Male", "Female"])],
            "dob" => ["required", "string"],
            "image" => ["nullable", "image", "mimes:jpeg,png,jpg,gif,svg", "max:2048"],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique('users')
                ->ignore($this->route("user")),],
            "status" => ["required"]

        ];
    }
}
