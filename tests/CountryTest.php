<?php

use CountryEnums\Country;
use CountryEnums\Region;

it('will spawn a country using static cases', function () {
    expect(Country::AU->value)->toBe('AU');
    expect(Country::NZ->value)->toBe('NZ');
});

it('will spawn a country using static from', function () {
    expect(Country::from('AU'))->toBe(Country::AU);
    expect(Country::from('NZ'))->toBe(Country::NZ);
    expect(Country::tryFrom('US'))->toBe(Country::US);
    expect(Country::tryFrom('NZZZZ'))->toBeNull(null);
});

it('will produce the correct labels', function () {
    expect(Country::AU->label())->toBe('Australia');
    expect(Country::NZ->label())->toBe('New Zealand');
    expect(Country::US->label())->toBe('United States');
});

it('will produce the correct codes', function () {
    expect(Country::AU->code())->toBe('australia');
    expect(Country::NZ->code())->toBe('new_zealand');
    expect(Country::US->code())->toBe('united_states');
});

it('can retrieve a random country', function () {
    expect(Country::random())->toBeIn(Country::cases());
});

it('can retrieve all values', function () {
    $all = Country::getValues();

    // Assert first and last are as expected
    expect($all[0])->toBe(Country::AF->value);
    expect($all[count($all) - 1])->toBe(Country::ZW->value);

    // Assert approx count is correct
    expect(count($all))->toBeGreaterThanOrEqual(245)->toBeLessThanOrEqual(255);
});

it('can retrieve all options', function () {
    $all = Country::getOptions();

    // Assert keys of array are values
    expect(array_keys($all))->toBe(Country::getValues());

    // Assert values of array are labels
    expect($all[array_key_first($all)])->toBe(Country::AF->label());
    expect($all[array_key_last($all)])->toBe(Country::ZW->label());

    // Rough check is fine
    expect(count($all))->toBeGreaterThanOrEqual(245)->toBeLessThanOrEqual(255);
});

it('can retrieve a list of regions by country', function () {
    expect(Country::AU->regions())->toBe([
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

it('can retrieve a list of regions values by country', function () {
    expect(Country::AU->getRegionValues())->toBe([
        'AU_ACT',
        'AU_NSW',
        'AU_NT',
        'AU_QLD',
        'AU_SA',
        'AU_TAS',
        'AU_VIC',
        'AU_WA',
    ]);
});

it('can retrieve the svg flag path', function () {
    $expect = file_get_contents(__DIR__ . '/fixtures/au.svg');

    $path = Country::AU->svgFlag();
    expect(file_exists($path))->toBeTrue();

    $actual = file_get_contents($path);
    expect($actual)->toBe($expect);

    $actual = Country::AU->svgFlagContents();
    expect($actual)->toBe($expect);
});

it('can retrieve the png flag paths', function () {
    $sizes = [
        1 => 100,
        100 => 100,
        101 => 250,
        250 => 250,
        251 => 1000,
        1000 => 1000,
        1001 => 1000,
    ];

    foreach ($sizes as $input => $output) {
        $expect = file_get_contents(__DIR__ . '/fixtures/au_' . $output . '.png');

        $path = Country::AU->pngFlag($input);
        expect(file_exists($path))->toBeTrue();
    
        $actual = file_get_contents($path);
        expect($actual)->toBe($expect);

        $actual = Country::AU->pngFlagContents($input);
        expect($actual)->toBe($expect);
    }
});

it('can retrieve a country by its code', function () {
    expect(Country::fromCode('australia'))->toBe(Country::AU);
    expect(Country::fromCode('new_zealand'))->toBe(Country::NZ);
    expect(Country::fromCode('united_states'))->toBe(Country::US);
    expect(Country::tryFromCode('united_statessss'))->toBe(null);
});

it('can compile a country to array', function () {
    expect(Country::AU->toArray())->toBe([
        'label' => 'Australia',
        'value' => 'AU',
        'regions' => [
            [
                'label' => 'Australian Capital Territory',
                'value' => 'AU_ACT',
                'region' => 'ACT',
                'country' => 'AU',
                'code' => 'australia_australian_capital_territory',
            ],
            [
                'label' => 'New South Wales',
                'value' => 'AU_NSW',
                'region' => 'NSW',
                'country' => 'AU',
                'code' => 'australia_new_south_wales',
            ],
            [
                'label' => 'Northern Territory',
                'value' => 'AU_NT',
                'region' => 'NT',
                'country' => 'AU',
                'code' => 'australia_northern_territory',
            ],
            [
                'label' => 'Queensland',
                'value' => 'AU_QLD',
                'region' => 'QLD',
                'country' => 'AU',
                'code' => 'australia_queensland',
            ],
            [
                'label' => 'South Australia',
                'value' => 'AU_SA',
                'region' => 'SA',
                'country' => 'AU',
                'code' => 'australia_south_australia',
            ],
            [
                'label' => 'Tasmania',
                'value' => 'AU_TAS',
                'region' => 'TAS',
                'country' => 'AU',
                'code' => 'australia_tasmania',
            ],
            [
                'label' => 'Victoria',
                'value' => 'AU_VIC',
                'region' => 'VIC',
                'country' => 'AU',
                'code' => 'australia_victoria',
            ],
            [
                'label' => 'Western Australia',
                'value' => 'AU_WA',
                'region' => 'WA',
                'country' => 'AU',
                'code' => 'australia_western_australia',
            ],
        ],
        'code' => 'australia',
    ]);
});