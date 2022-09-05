<?php

use Tilley\CountryEnums\Country;
use Tilley\CountryEnums\Region;

function dd()
{
    array_map(fn($x) => print_r($x), func_get_args());
    die;
}

require_once __DIR__ . '/../vendor/autoload.php';

$au = Country::AU;
$region = $au->regions()[0];
$random = Region::random($au);

print_r($au->toArray());
print_r($region->toArray());
print_r($random->label());