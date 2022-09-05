# country-enums
All (or at least most) countries and their regions formatted as PHP enums.


### Usage

```php
// Get a country enum by two-character identifier
$country = Country::AU;
$country = Country::from('AU');

// Get country label
$country->label();
// Australia

// Get country sort key
$country->sortKey();
// australia

// Get country two-character identifier
$country->value;
// AU

// Get country regions
$country->regions();
// array<Region>

// Get a region by country + region identifiers
$region = Region::AU_ACT;
$region = Region::from('AU_ACT');

// Get region label
$region->label();
// Australian Capital Territory

// Get region sort key
$region->sortKey();
// australia_capital_territory

// Get region country
$region->country();
// Country::AU

// Cast region to array
$region->toArray();
// [ 'label' => 'Australian Capital Territory', 'value' => 'AU_ACT', 'region' => 'ACT', 'country' => 'AU', 'sort' => 'australian_capital_territory' ]

// Cast country to array
$country->toArray();
// [ 'label' => 'Australia ,'value' => 'AU', 'regions' => [ ...$regions->toArray() ], 'sort' => 'australia' ]

// Get a random Region (any country)
$random = Region::random();
$region->value;
// US_CA

$region = Region::random('AU');
$region = Region::random(Country::AU);
$region->value;
// AU_QLD

// Get a random Country
$random = Country::random();
$random->value;
// NZ
```