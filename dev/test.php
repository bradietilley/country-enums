<?php

use CountryEnums\Country;
use CountryEnums\Region;

$from = memory_get_peak_usage(true);

function dd(): never
{
    array_map(fn ($x) => print_r($x), func_get_args());
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

foreach (Country::cases() as $country) {
    print "\n" . $country->svgFlag();
}

$to = memory_get_peak_usage(true);
print "\n" . print_r($to - $from, true);
