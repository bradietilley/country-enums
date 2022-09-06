# PHP Country (and Region) Enums

All (or at least most) countries and their regions formatted as PHP enums.

Includes automatic relationships between Countries and Regions, and comes out of the box with svg & png flags. See Authors section for due credit.


## Usage


#### Country Enum

All countries are defined by their two-letter codes (*ISO 3166-1 alpha-2?*).

```php
$country = Country::US;
$country = Country::from('US');
```

| Method/Accessor                         | Description                                        | Example                                                     | Type                        |
| ----------------------------------------|----------------------------------------------------|-------------------------------------------------------------|-----------------------------|
| $country->value                         | Get the two-letter code                            | "US"                                                        | string                      |
| $country->label()                       | Get the human-readable label                       | "United States"                                             | string                      |
| $country->code()                        | Get the English snake_case code name               | "united_states"                                             | string                      |
| $country->regions()                     | Get all regions in the country                     | [ Region::US_AL, ..., Region::US_WY ]                       | Region[]                    |
| $country->toArray()                     | Compile the Country enum to array                  | [ 'value' => 'US', 'label' => 'United States', 'code' => 'united_states', 'regions' => [ [...], ... [...] ] ] | array            |
| $country->svgFlag()                     | Get the *path* to the SVG Flag                     | /var/www/.../country-enums/country-flags/svg/us.svg         | string\|null                 |
| $country->svgFlagContent()              | Get the *content* of the SVG Flag (XML)            | *xml content of svg*                                        | string\|null                 |
| $country->pngFlag(int $size = 100)      | Get the *path* to the PNG Flag for the given size (100, 250, 1000)  | /var/www/.../country-enums/country-flags/png250px/us.png         | string\|null                 |
| $country->pngFlagContent(int $size = 100) | Get the *content* of the PNG Flag for the given size (100, 250, 1000)  | *binary content of png*               | string\|null                 |
| Country::random()                       | Get a random country                               | Country::NZ                                                 | Country                     |
| Country::getValues()                    | Get a list of available "values"                   | [ "AF", ..., "ZW" ]                                         | string[]                    |
| Country::getOptions()                   | Get a list of available options (key val pairs)    | [ "AF" => "Afghanistan", ..., "ZW" => "Zimbabwe" ]          | array                       |
| Country::cases()                        | Core-PHP function to get all enum cases            | [ Country::AF, ..., Country::ZW ]                           | Country[]                   |
| Country::from(string $value (e.g. 'NZ'))     | Core-PHP function to convert value to enum         | Country::NZ (or throws exception if invalid)                | Country                     |
| Country::tryFrom(string $value (e.g. 'NZ'))  | Core-PHP function to convert value to enum (/null) | Country::NZ (or null if invalid)                            | Country\|null               |


When a country is compiled to array, all of its regions are casted to array as well and are made available in the 'regions' array.


#### Region Enum

All regions are defined by their country's two-letter code followed by an underscore then a variable length code for the region itself.


```php
$region = Region::US_CA;
$region = Country::from('US_CA');
```

| Method/Accessor                         | Description                                        | Example                                                     | Type                        |
| ----------------------------------------|----------------------------------------------------|-------------------------------------------------------------|-----------------------------|
| $region->value                          | Get the code                                       | "US_CA"                                                     | string                      |
| $region->label()                        | Get the human-readable label                       | "California"                                                | string                      |
| $region->code()                         | Get the English snake_case code name               | "california"                                                | string                      |
| $region->country()                      | Get the country for this region                    | Country::US                                                 | Country                     |
| $region->countryCode()                  | Get the country code for this region               | "US"                                                        | string                      |
| $region->regionCode()                   | Get the region code for this region                | "CA"                                                        | string                      |
| $region->toArray()                      | Compile the Region enum to array                   | [ 'value' => 'US_CA', 'label' => 'California', 'code' => 'california', 'country' => 'US', 'region' => 'CA' ] | array           | 
| Region::for(Country\|string $country)   | Get a list of regions in the given country         | [ Region::US_AL, ..., Region::US_WY ]                       | Region[]                    |
| Region::random(Country\|string $country)| Get a random regions in the given country          | Region::US_TX                                               | Region                      |
| Region::getValues()                     | Get a list of available "values"                   | [ "AL", ..., "WY" ]                                         | string[]                    |
| Region::getOptions()                    | Get a list of available options (key val pairs)    | [ "AL" => "Alabama", ..., "WY" => "Wyoming" ]               | array                       |
| Region::cases()                         | Core-PHP function to get all enum cases            | [ Region::AF_BDS, ..., Region::ZW_MI ]                      | Region[]                    |
| Region::from(string $val (e.g. 'NZ_AUK'))    | Core-PHP function to convert value to enum         | Region::NZ_AUK (or throws exception if invalid)             | Region                      |
| Region::tryFrom(string $val (e.g. 'NZ_AUK')) | Core-PHP function to convert value to enum (/null) | Region::NZ_AUK (or null if invalid)                         | Region\|null                |


When a region is compiled to array, its region and country codes are made available as separate key-value pairs alongside the globally-unique "value" (see above).


# Authors

PHP Enum classes generated by Bradie Tilley.


### Specials Thanks

Thanks to all the people who have contributed to the following open source repositories

- Country/Region Data: https://github.com/country-regions/country-region-data
- SVG/PNG Flags: https://github.com/hampusborgos/country-flags