<?php

namespace CountryEnums\Exceptions;

use RuntimeException;

final class LaravelNotFoundException extends RuntimeException
{
    public static function classMissing(string $class): self
    {
        return new static(
            sprintf('The class %s does not exist (Laravel is required to run this function)', $class),
        );
    }
}