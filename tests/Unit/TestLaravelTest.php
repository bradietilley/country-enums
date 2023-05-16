<?php

use CountryEnums\Country;
use CountryEnums\Region;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rules\In;
use Illuminate\Validation\Rules\Enum;

it('will return a collection when country::collect is run with laravel', function () {
    $collection = Country::collect();

    expect($collection instanceof Collection)->toBeTrue();
    expect($collection->all())->toBe(Country::cases());
});

it('will return a collection when region::collect is run with laravel', function () {
    $collection = Region::collect();

    expect($collection instanceof Collection)->toBeTrue();
    expect($collection->all())->toBe(Region::cases());
});

it('will return a collection when country::collectOptions is run with laravel', function () {
    $collection = Country::collectOptions();

    expect($collection instanceof Collection)->toBeTrue();
    expect($collection->all())->toBe(Country::getOptions());
});

it('will return a collection when region::collectOptions is run with laravel', function () {
    $collection = Region::collectOptions();

    expect($collection instanceof Collection)->toBeTrue();
    expect($collection->all())->toBe(Region::getOptions());
});

it('will return a collection when country::collectValues is run with laravel', function () {
    $collection = Country::collectValues();

    expect($collection instanceof Collection)->toBeTrue();
    expect($collection->all())->toBe(Country::getValues());
});

it('will return a collection when region::collectValues is run with laravel', function () {
    $collection = Region::collectValues();

    expect($collection instanceof Collection)->toBeTrue();
    expect($collection->all())->toBe(Region::getValues());
});

it('will return a collection when country::collectRegions is run with laravel', function () {
    $collection = Country::AU->collectRegions();

    expect($collection instanceof Collection)->toBeTrue();
    expect($collection->all())->toBe(Country::AU->regions());
});

it('will return a collection when country::collectRegionValues is run with laravel', function () {
    $collection = Country::AU->collectRegionValues();

    expect($collection instanceof Collection)->toBeTrue();
    expect($collection->all())->toBe(Country::AU->getRegionValues());
});

it('will return a collection when region::collecFor is run with laravel', function () {
    $collection = Region::collectFor(Country::AU);

    expect($collection instanceof Collection)->toBeTrue();
    expect($collection->all())->toBe(Region::for('AU'));
});

it('will return an In Rule class when country::inRule is run with laravel', function () {
    $rule = Country::inRule();

    expect($rule instanceof In)->toBeTrue();
    $values = (new ReflectionProperty($rule, 'values'));
    expect($values->getValue($rule))->toBe(Country::getValues());
});

it('will return an In Rule class when region::inRule is run with laravel', function () {
    $rule = Region::inRule();

    expect($rule instanceof In)->toBeTrue();
    $values = (new ReflectionProperty($rule, 'values'));
    expect($values->getValue($rule))->toBe(Region::getValues());

    $rule = Region::inRule('AU');

    expect($rule instanceof In)->toBeTrue();
    $values = (new ReflectionProperty($rule, 'values'));
    expect($values->getValue($rule))->toBe(Region::getValues('AU'));
});

it('will return an Enum Rule when country::enumRule is run with laravel', function () {
    $rule = Country::enumRule();

    expect($rule instanceof Enum)->toBeTrue();

    $type= (new ReflectionProperty($rule, 'type'));
    expect($type->getValue($rule))->toBe(Country::class);
});

it('will return an Enum rule when region::enumRule is run with laravel', function () {
    $rule = Region::enumRule();

    expect($rule instanceof Enum)->toBeTrue();

    $type= (new ReflectionProperty($rule, 'type'));
    expect($type->getValue($rule))->toBe(Region::class);
});
