<?php

namespace App\Http\Requests\Guest;

use App\Rules\GuestRegisterRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class GuestCompanyRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => ["required", "string", "max:255", new GuestRegisterRule()],
            "email" => ["required", "email", "max:255", new GuestRegisterRule()],
            "password" => ["required", "string", "min:6"],
            "address" => ["required", "string", "max:255"],
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response([
            "errors" => $validator->getMessageBag()
        ])->setStatusCode(400));
    }
}
