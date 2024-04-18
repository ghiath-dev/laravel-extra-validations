<?php

namespace Holoultek\LaravelExtraValidations\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class NullableLt implements ValidationRule
{
    /**
     * The name of the rule.
     *
     * @var string
     */
    protected $rule = 'nullable_lt';

    public function __construct(protected $compare_field)
    {
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $other_value = request()->get($this->compare_field);

        if(is_null($other_value)) {
            return;
        }

        if($value > $other_value) {
            $fail('validation.'.$this->rule);
        }
    }
}
