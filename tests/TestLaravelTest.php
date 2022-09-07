<?php

use CountryEnums\Country;
use CountryEnums\Region;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rules\In;
use Illuminate\Validation\Rules\Enum;

it('will return a collection when country::collect is run with laravel', function () {
    require_once __DIR__ . '/fixtures/Laravel/Collection.php';

    $collection = Country::collect();

    expect($collection instanceof Collection)->toBeTrue();
    expect($collection->items)->toBe(Country::cases());
});

it('will return a collection when region::collect is run with laravel', function () {
    require_once __DIR__ . '/fixtures/Laravel/Collection.php';

    $collection = Region::collect();

    expect($collection instanceof Collection)->toBeTrue();
    expect($collection->items)->toBe(Region::cases());
});

it('will return an In Rule class when country::inRule is run with laravel', function () {
    require_once __DIR__ . '/fixtures/Laravel/In.php';

    $rule = Country::inRule();

    expect($rule instanceof In)->toBeTrue();
    expect($rule->values)->toBe(Country::getValues());
});

it('will return an In Rule class when region::inRule is run with laravel', function () {
    require_once __DIR__ . '/fixtures/Laravel/In.php';

    $rule = Region::inRule();

    expect($rule instanceof In)->toBeTrue();
    expect($rule->values)->toBe(Region::getValues());

    $rule = Region::inRule('AU');

    expect($rule instanceof In)->toBeTrue();
    expect($rule->values)->toBe(Region::getValues('AU'));
});

it('will return an Enum Rule when country::enumRule is run with laravel', function () {
    require_once __DIR__ . '/fixtures/Laravel/Enum.php';

    $rule = Country::enumRule();

    expect($rule instanceof Enum)->toBeTrue();
    expect($rule->enum)->toBe(Country::class);
});

it('will return an Enum rule when region::enumRule is run with laravel', function () {
    require_once __DIR__ . '/fixtures/Laravel/Enum.php';

    $rule = Region::enumRule();

    expect($rule instanceof Enum)->toBeTrue();
    expect($rule->enum)->toBe(Region::class);
});