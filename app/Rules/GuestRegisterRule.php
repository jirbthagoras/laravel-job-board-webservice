<?php

namespace App\Rules;

use App\Models\User;
use Closure;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\ValidatorAwareRule;
use Illuminate\Support\Facades\Validator;

class GuestRegisterRule implements ValidationRule, DataAwareRule, ValidatorAwareRule
{
    private array $data;
    private \Illuminate\Validation\Validator $validator;

    public function setData(array $data)
    {
        $this->data = $data;
        return $this;
    }

    public function setValidator(\Illuminate\Validation\Validator $validator)
    {
        $this->validator = $validator;
        return $this;
    }


    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(
            $result = User::query()
                ->where($attribute, "=", $value)
                ->first()
        )
        {
            if($this->data[$attribute] == $result->{$attribute})
            {
                $fail("$attribute: $value already exists");
            }
        }
    }


}
