# country-enums
All (or at least most) countries and their regions formatted as PHP enums.


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
| $country->sortKey()                     | Get the English snake_case key for sorting         | "united_states"                                             | string                      |
| $country->regions()                     | Get all regions in the country                     | [ Region::US_AL, ..., Region::US_WY ]                       | Region[]                    |
| $country->toArray()                     | Compile the Country enum to array                  | [ 'value' => 'US', 'label' => 'United States', 'sort' => 'united_states', 'regions' => [ [...], ... [...] ] ] | array            |
| Country::random()                       | Get a random country                               | Country::NZ                                                 | Country                     |
| Country::getValues()                    | Get a list of available "values"                   | [ "AF", ..., "ZW" ]                                         | string[]                    |
| Country::getOptions()                   | Get a list of available options (key val pairs)    | [ "AF" => "Afghanistan", ..., "ZW" => "Zimbabwe" ]          | array                    |


When a country is compile to array, all of its regions are casted to array aswell and are made available in the 'regions' array.

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
| $region->sortKey()                      | Get the English snake_case key for sorting         | "california"                                                | string                      |
| $region->country()                      | Get the country for this region                    | Country::US                                                 | Country                     |
| $region->countryCode()                  | Get the country code for this region               | "US"                                                        | string                      |
| $region->regionCode()                   | Get the region code for this region                | "CA"                                                        | string                      |
| $region->toArray()                      | Compile the Region enum to array                   | [ 'value' => 'US_CA', 'label' => 'California', 'sort' => 'california', 'country' => 'US', 'region' => 'CA' ] | array           | 
| Region::for(Country\|string $country)   | Get a list of regions in the given country         | [ Region::US_AL, ..., Region::US_WY ]                       | Region[]                    |
| Region::random(Country\|string $country)| Get a random regions in the given country          | Region::US_TX                                               | Region                      |
| Region::getValues()                     | Get a list of available "values"                   | [ "AL", ..., "WY" ]                                         | string[]                    |
| Region::getOptions()                    | Get a list of available options (key val pairs)    | [ "AL" => "Alabama", ..., "WY" => "Wyoming" ]               | array                    |


When a region is compiled to array, its region and country codes are made available as separate key-value pairs alongside the globally-unique "value" (see above).