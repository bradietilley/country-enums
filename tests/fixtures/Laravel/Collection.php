<?php

namespace Illuminate\Support;

class Collection
{
    public function __construct(public array $items = [])
    {
    }

    public static function make(array $items = [])
    {
        return new static($items);
    }
}