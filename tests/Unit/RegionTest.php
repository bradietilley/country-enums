<?php

use CountryEnums\Country;
use CountryEnums\Exceptions\EnumNotFoundException;
use CountryEnums\Exceptions\LaravelNotFoundException;
use CountryEnums\Region;

it('will spawn a region using static cases', function () {
    expect(Region::AU_NSW->value)->toBe('AU_NSW');
    expect(Region::NZ_AUK->value)->toBe('NZ_AUK');
});

it('will spawn a region using static from', function () {
    expect(Region::from('AU_NSW'))->toBe(Region::AU_NSW);
    expect(Region::from('NZ_AUK'))->toBe(Region::NZ_AUK);
    expect(Region::tryFrom('US_CA'))->toBe(Region::US_CA);
    expect(Region::tryFrom('NZ_ZZZ'))->toBeNull();
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

it('can retrieve all region values by country', function () {
    $all = Region::getValues('AU');
    $all2 = Region::getValues(Country::AU);

    expect($all)->toBe($all2);

    // Assert first and last are as expected
    expect($all[0])->toBe(Region::AU_ACT->value);
    expect($all[count($all) - 1])->toBe(Region::AU_WA->value);

    // Assert count is correct
    expect(count($all))->toBe(8);
});

it('can retrieve all options', function () {
    $all = Region::getOptions();

    // Assert keys of array are values
    expect(array_keys($all))->toBe(Region::getValues());

    // Assert values of array are labels
    expect($all[array_key_first($all)])->toBe(Region::AF_BDS->label());
    expect($all[array_key_last($all)])->toBe(Region::ZW_MI->label());

    // Rough check is fine
    expect(count($all))->toBeGreaterThanOrEqual(2000)->toBeLessThanOrEqual(3000);
});

it('can retrieve all options by country', function () {
    $all = Region::getOptions('AU');
    $all2 = Region::getOptions(Country::AU);

    expect($all)->toBe($all2);

    // Assert keys of array are values
    expect($all)->toBe([
        Region::AU_ACT->value => Region::AU_ACT->label(),
        Region::AU_NSW->value => Region::AU_NSW->label(),
        Region::AU_NT->value => Region::AU_NT->label(),
        Region::AU_QLD->value => Region::AU_QLD->label(),
        Region::AU_SA->value => Region::AU_SA->label(),
        Region::AU_TAS->value => Region::AU_TAS->label(),
        Region::AU_VIC->value => Region::AU_VIC->label(),
        Region::AU_WA->value => Region::AU_WA->label(),
    ]);

    // Assert values of array are labels
    expect($all[array_key_first($all)])->toBe(Region::AU_ACT->label());
    expect($all[array_key_last($all)])->toBe(Region::AU_WA->label());

    // Assert count is correct
    expect(count($all))->toBe(8);
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

it('can retrieve a list of regions by country code', function () {
    $expect1 = Region::for('AU');
    $expect2 = Region::for(Country::AU);

    expect($expect1)->toBe($expect2);
    expect($expect1)->toBe([
        Region::AU_ACT,
        Region::AU_NSW,
        Region::AU_NT,
        Region::AU_QLD,
        Region::AU_SA,
        Region::AU_TAS,
        Region::AU_VIC,
        Region::AU_WA,
    ]);
});

it('can compile a country to array', function () {
    expect(Region::AU_NSW->toArray())->toBe([
        'label' => 'New South Wales',
        'value' => 'AU_NSW',
        'region' => 'NSW',
        'country' => 'AU',
        'code' => 'australia_new_south_wales',
    ]);
});

it('can compile a region to json', function () {
    expect(Region::AU_NSW->toJson())->toBe(json_encode(Region::AU_NSW->toArray()));
});

it('can parse a region value to an enum value', function () {
    expect(Region::parse('AU_NSW'))->toBe(Region::AU_NSW);
    expect(Region::parse(Region::AU_NSW))->toBe(Region::AU_NSW);
});

it('throws an exception when parsing an invalid region', function () {
    Region::parse('invalid');
})->throws(EnumNotFoundException::class, 'Enum value "invalid" not found in Region');

it('throws an exception when parsing a null region', function () {
    Region::parse(null);
})->throws(EnumNotFoundException::class, 'Enum value null not found in Region');

it('can try parse a region value to an enum value', function () {
    expect(Region::tryParse('AU_NSW'))->toBe(Region::AU_NSW);
    expect(Region::tryParse(Region::AU_NSW))->toBe(Region::AU_NSW);
    expect(Region::tryParse('invalid'))->toBeNull();
    expect(Region::tryParse(null))->toBeNull();
});
