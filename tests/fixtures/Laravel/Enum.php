<?php

namespace Illuminate\Validation\Rules;

if (! class_exists(Enum::class)) {
    class Enum
    {
        public function __construct(public string $enum)
        {
        }
    }
}