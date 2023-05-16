<?php

namespace CountryEnums\Exceptions;

use InvalidArgumentException;

class EnumNotFoundException extends InvalidArgumentException
{
    public static function valueNotFound(string|null $value, string $enumClass): self
    {
        return new static(
            sprintf('Enum value %s not found in %s', json_encode($value), $enumClass)
        );
    }

    public static function codeNotFound(string|null $value, string $enumClass): self
    {
        return new static(
            sprintf('Enum code %s not found in %s', json_encode($value), $enumClass)
        );
    }
}
