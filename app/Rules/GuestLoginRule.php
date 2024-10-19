<?php

namespace App\Rules;

use Closure;
use Dotenv\Validator;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\ValidatorAwareRule;

class GuestLoginRule implements ValidationRule, DataAwareRule, ValidatorAwareRule
{
    private array $data;
    private \Illuminate\Support\Facades\Validator $validator;

    public function setData(array $data): GuestLoginRule
    {
        // TODO: Implement setData() method.
    }

    public function setValidator(\Illuminate\Validation\Validator $validator)
    {
        // TODO: Implement setValidator() method.
    }


    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
    }
}
