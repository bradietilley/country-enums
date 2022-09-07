<?php

namespace Illuminate\Validation\Rules;

class Enum
{
    public function __construct(public string $enum)
    {
    }
}