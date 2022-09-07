<?php

namespace Illuminate\Validation\Rules;

class In
{
    public function __construct(public array $values = [])
    {
    }
}