<?php

namespace Milwad\LaravelValidate\Utils;

use Milwad\LaravelValidate\Utils\CountryPhoneValidator\CountryPhoneValidator;

class CountryPhoneCallback
{
    /**
     * Country Validate classes.
     *
     * @var array
     */
    protected static array $validators = [];

    /**
     * Add new country validator
     */
    public static function addValidator(string $code, CountryPhoneValidator $validator): void
    {
        self::$validators[$code] = $validator;
    }

    /**
     * Call country validate class.
     */
    public function callPhoneValidator(string $code, $value)
    {
        if (isset($this->validators[$code])) {
            return (new $this->validators[$code])->validate($value);
        } else {
            throw new \BadMethodCallException("Validator method for '$code' does not exist.");
        }
    }
}
