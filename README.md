# PHP Country (and Region) Enums

All (or at least most) countries and their regions formatted as PHP enums, framework agnostic (of course).

Includes automatic relationships between Countries and Regions, and comes out of the box with svg & png flags. See Authors section for due credit.

Includes a small handful of Laravel helper methods which are made available if this is installed on a Laravel app.

## Requirements

PHP 8.1+


## Installation

Install it via composer:

```
composer require bradietilley/country-enums
```


## Usage


#### Country Enum

All countries are defined by their two-letter codes (*ISO 3166-1 alpha-2?*).

```php
$country = Country::US;
$country = Country::from('US');
```

| Method/Accessor | Description | Example | Type |
| -|-|-|-|
| $country->value | Get the two-letter code | "US" | string |
| $country->label() | Get the human-readable label | "United States" | string |
| $country->code() | Get the English snake_case code name | "united_states" | string |
| $country->regions() | Get all regions in the country | [ Region::US_AL, ..., Region::US_WY ] | array&lt;Region&gt; |
| $country->collectRegions() | Get all regions in the country as a collection (requires Laravel if used) | Collection::make([ Region::US_AL, ..., Region::US_WY ]) | \Illuminate\Support\Collection&lt;Region&gt; |
| $country->regionsValues() | Get all region values (e.g. 'AU_NSW') in the country | [ 'US_AL', ..., 'US_WY' ] | array&lt;string&gt; |
| $country->collectRegionsValues() | Get all region values (e.g. 'AU_NSW') in the country as a collection (requires Laravel if used) | Collection:make([ 'US_AL', ..., 'US_WY' ]) | \Illuminate\Support\Collection&lt;string&gt; |
| $country->toArray() | Compile the Country enum to array | [ 'value' => 'US', 'label' => 'United States', 'code' => 'united_states', 'regions' => [ [...], ... [...] ] ] | array |
| $country->toJson($options = 0) | Compile the Country enum to a JSON string | json_encode($country->toArray(), $options = 0) | string |
| $country->svgFlag() | Get the *path* to the SVG Flag | /var/www/.../country-enums/flags/svg/us.svg | string\|null |
| $country->svgFlagContent() | Get the *content* of the SVG Flag (XML) | [svg](https://raw.githubusercontent.com/bradietilley/country-enums/master/flags/svg/au.svg) | string\|null |
| $country->pngFlag(int $size = 100) | Get the *path* to the PNG Flag for the given size (100, 250, 1000)  | /var/www/.../country-enums/flags/png250px/us.png | string\|null |
| $country->pngFlagContent(int $size = 100) | Get the *content* of the PNG Flag for the given size (100, 250, 1000)  | [png](https://raw.githubusercontent.com/bradietilley/country-enums/master/flags/png100px/au.png) | string\|null |
| Country::random() | Get a random country | Country::NZ | Country |
| Country::getValues() | Get a list of available "values" | [ "AF", ..., "ZW" ] | array&lt;string&gt; |
| Country::collectValues() | Get a list of available "values" as a collection (requires Laravel if used) | Collection::make([ "AF", ..., "ZW" ]) | \Illuminate\Support\Collection&lt;string&gt; |
| Country::getOptions() | Get a list of available options (key val pairs) | [ "AF" => "Afghanistan", ..., "ZW" => "Zimbabwe" ] | array&lt;string,string&gt; |
| Country::collectOptions() | Get a list of available options (key val pairs) as a collection (requires Laravel if used) | Collection::make([ "AF" => "Afghanistan", ..., "ZW" => "Zimbabwe" ]) | \Illuminate\Support\Collection&lt;string,string&gt; |
| Country::cases() | Core-PHP function to get all enum cases | [ Country::AF, ..., Country::ZW ] | array&lt;Country&gt; |
| Country::collect() | Get all Country enums in a Collection class (requires Laravel if used) | Collection::make([ Country::AF, ..., Country::ZW ]) | \Illuminate\Support\Collection&lt;Country&gt;
| Country::from(string $value (e.g. 'NZ')) | Core-PHP function to convert value to enum | Country::NZ (or throws exception if invalid) | Country |
| Country::tryFrom(string $value (e.g. 'NZ'))  | Core-PHP function to convert value to enum (/null) | Country::NZ (or null if invalid) | Country\|null |
| Country::parse(string|Country|null $country (e.g. 'AU')) | Parse the given string, Country or null value to Country enum | Country::AU (or throws exception if invalid) | Country |
| Country::tryParse(string|Country|null $country (e.g. 'AU')) | Parse the given string, Country or null value to Country enum | Country::AU (or null if invalid) | Country\|null |
| Country::inRule() | Get an 'In' ruleset that asserts the validated value is a backing value of Country, e.g. 'AU' (requires Laravel if used) | new In([ 'AF', ..., 'ZW' ]) | \Illuminate\Validation\Rules\In
| Country::enumRule() | Get an 'Enum' ruleset that asserts the validated value is a backing value of Country, e.g. 'AU' (requires Laravel if used) | new Enum(Country::class) | \Illuminate\Validation\Rules\Enum


When a country is compiled to array, all of its regions are casted to array as well and are made available in the 'regions' array.


#### Region Enum

All regions are defined by their country's two-letter code followed by an underscore then a variable length code for the region itself.


```php
$region = Region::US_CA;
$region = Country::from('US_CA');
```

| Method/Accessor | Description | Example | Type |
| -|-|-|-|
| $region->value | Get the code | "US_CA" | string |
| $region->label() | Get the human-readable label | "California" | string |
| $region->code() | Get the English snake_case code name | "california" | string |
| $region->country() | Get the country for this region | Country::US | Country |
| $region->countryCode() | Get the country code for this region | "US" | string |
| $region->regionCode() | Get the region code for this region | "CA" | string |
| $region->toArray() | Compile the Region enum to array | [ 'value' => 'US_CA', 'label' => 'California', 'code' => 'california', 'country' => 'US', 'region' => 'CA' ] | array | 
| $region->toJson($options = 0) | Compile the Region enum to a JSON string | json_encode($region->toArray(), $options = 0) | string |
| Region::for(Country\|string $country) | Get a list of regions (in the given $country if provided) | [ Region::US_AL, ..., Region::US_WY ] | array&lt;Region&gt; |
| Region::collectFor(Country\|string $country) | Get a list of regions (in the given $country if provided) as a collection (requires Laravel if used) | Collection::make(Region::for($country)) | \Illuminate\Support\Collection&lt;Region&gt; |
| Region::random(Country\|string\|null $country)| Get a random region (in the given $country if provided) | Region::US_TX | Region |
| Region::getValues(Country\|string\|null $country) | Get a list of available "values" | [ "AL", ..., "WY" ] | array&lt;string&gt; |
| Region::collectValues(Country\|string\|null $country) | Get a list of available "values"  as a collection (requires Laravel if used)| Collection::make([ "AL", ..., "WY" ]) | \Illuminate\Support\Collection&lt;string&gt; |
| Region::getOptions(Country\|string\|null $country) | Get a list of available options (key val pairs) | [ "AL" => "Alabama", ..., "WY" => "Wyoming" ] | array&lt;string,string&gt; |
| Region::collectOptions(Country\|string\|null $country) | Get a list of available options (key val pairs) as a collection (requires Laravel if used) | Collection::make([ "AL" => "Alabama", ..., "WY" => "Wyoming" ]) | \Illuminate\Support\Collection&lt;string,string&gt; |
| Region::cases() | Core-PHP function to get all enum cases | [ Region::AF_BDS, ..., Region::ZW_MI ] | array&lt;Region&gt; |
| Region::collect() | Get all Region enums in a Collection class (requires Laravel if used) | Collection::make([ Region::AF_BDS, ..., Region::ZW_MI ]) | \Illuminate\Support\Collection&lt;Region&gt;
| Region::from(string $val (e.g. 'NZ_AUK')) | Core-PHP function to convert value to enum | Region::NZ_AUK (or throws exception if invalid) | Region |
| Region::tryFrom(string $val (e.g. 'NZ_AUK')) | Core-PHP function to convert value to enum (/null) | Region::NZ_AUK (or null if invalid) | Region\|null |
| Region::parse(string\|Region\|null $region (e.g. 'AU_NSW')) | Parse the given string, Region or null value to Region enum | Region::AU_NSW (or throws exception if invalid) | Region |
| Region::tryParse(string\|Region\|null $region (e.g. 'AU_NSW')) | Parse the given string, Region or null value to Region enum | Region::AU_NSW (or null if invalid) | Region\|null |
| Region::inRule(string\|Country\|null $country = null) | Get an 'In' ruleset that asserts the validated value is a backing value of Region, e.g. 'AU_NSW', optionally providing a country to limit the scope of valid regions (requires Laravel if used) | new In([ 'AF_BDS', ..., 'ZW_MI' ]) | \Illuminate\Validation\Rules\In
| Region::enumRule() | Get an 'Enum' ruleset that asserts the validated value is a backing value of Region, e.g. 'AU_NSW' (requires Laravel if used) | new Enum(Region::class) | \Illuminate\Validation\Rules\Enum

When a region is compiled to array, its region and country codes are made available as separate key-value pairs alongside the globally-unique "value" (see above).


## Author(s)

PHP Enum classes generated by Bradie Tilley.


## Specials Thanks

Thanks to all the people who have contributed to the following open source repositories

- Country/Region Data: https://github.com/country-regions/country-region-data
- SVG/PNG Flags: https://github.com/hampusborgos/country-flags