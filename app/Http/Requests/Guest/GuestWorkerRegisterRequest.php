<?php

namespace App\Http\Requests\Guest;

use App\Rules\GuestRegisterRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class GuestWorkerRegisterRequest extends FormRequest
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
            "name" => ["required", "string", "max:100", new GuestRegisterRule()],
            "email" => ["required", "email", "max:100", new GuestRegisterRule()],
            "password" => ["required", "string", "max:100", "min:6"],
            "age" => ["required", "integer", "between:1,100"],
            "prophecy" => ["required", "string", "max:100"],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response([
            "errors" => $validator->getMessageBag()
        ])->setStatusCode(400));
    }
}
