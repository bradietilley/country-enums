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

print "\n" . print_r($au->toArray(), true);
print "\n" . print_r($region->toArray(), true);
print "\n" . print_r($random->label(), true);
print "\n" . print_r($au->getRegionValues(), true);

print "\n" . print_r(count(Country::getValues()), true);
print "\n" . print_r(count(Region::getValues()), true);
print "\n" . print_r(count(Region::getValues('AU')), true);

print "\n" . print_r(count(Country::getOptions()), true);
print "\n" . print_r(count(Region::getOptions()), true);
print "\n" . print_r(count(Region::getOptions('AU')), true);