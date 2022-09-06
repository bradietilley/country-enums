<?php

use CountryEnums\Country;
use CountryEnums\Region;

it('will spawn a region using static cases', function () {
    expect(Region::AU_NSW->value)->toBe('AU_NSW');
    expect(Region::NZ_AUK->value)->toBe('NZ_AUK');
});

it('will spawn a region using static from', function () {
    expect(Region::from('AU_NSW'))->toBe(Region::AU_NSW);
    expect(Region::from('NZ_AUK'))->toBe(Region::NZ_AUK);
    expect(Region::tryFrom('US_CA'))->toBe(Region::US_CA);
    expect(Region::tryFrom('NZ_ZZZ'))->toBeNull(null);
});

it('will produce the correct labels', function () {
    expect(Region::AU_NSW->label())->toBe('New South Wales');
    expect(Region::NZ_AUK->label())->toBe('Auckland');
    expect(Region::US_CA->label())->toBe('California');
});

it('will produce the correct codes', function () {
    expect(Region::AU_NSW->code())->toBe('australia_new_south_wales');
    expect(Region::NZ_AUK->code())->toBe('new_zealand_auckland');
    expect(Region::US_CA->code())->toBe('united_states_california');
});

it('can retrieve a random region', function () {
    expect(Region::random())->toBeIn(Region::cases());
});

it('can retrieve all region values', function () {
    $all = Region::getValues();

    // Assert first and last are as expected
    expect($all[0])->toBe(Region::AF_BDS->value);
    expect($all[count($all) - 1])->toBe(Region::ZW_MI->value);

    // Assert approx count is correct
    expect(count($all))->toBeGreaterThanOrEqual(2000)->toBeLessThanOrEqual(3000);
});

it('can retrieve all options', function () {
    $all = Region::getOptions();

    // Assert keys of array are values
    expect(array_keys($all))->toBe(Region::getValues());

    // Assert values of array are labels
    expect($all[array_key_first($all)])->toBe(Region::AF_BDS->label());
    expect($all[array_key_last($all)])->toBe(Region::ZW_MI->label());

    // Rought check is fine
    expect(count($all))->toBeGreaterThanOrEqual(2000)->toBeLessThanOrEqual(3000);
});

it('can retrieve country by region', function () {
    expect(Region::AU_NSW->country())->toBe(Country::AU);
    expect(Region::NZ_AUK->country())->toBe(Country::NZ);
    expect(Region::US_CA->country())->toBe(Country::US);
});

it('can retrieve a region by its code', function () {
    expect(Region::fromCode('australia_new_south_wales'))->toBe(Region::AU_NSW);
    expect(Region::fromCode('new_zealand_auckland'))->toBe(Region::NZ_AUK);
    expect(Region::fromCode('united_states_california'))->toBe(Region::US_CA);
    expect(Region::tryFromCode('united_states_ssssss'))->toBe(null);
});