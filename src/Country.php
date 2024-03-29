<?php

namespace CountryEnums;

use CountryEnums\Exceptions\EnumNotFoundException;
use CountryEnums\Exceptions\LaravelNotFoundException;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Validation\Rules\In;
use ValueError;

enum Country: string
{
    case AF = 'AF'; // Afghanistan
    case AX = 'AX'; // Åland Islands
    case AL = 'AL'; // Albania
    case DZ = 'DZ'; // Algeria
    case AS = 'AS'; // American Samoa
    case AD = 'AD'; // Andorra
    case AO = 'AO'; // Angola
    case AI = 'AI'; // Anguilla
    case AQ = 'AQ'; // Antarctica
    case AG = 'AG'; // Antigua and Barbuda
    case AR = 'AR'; // Argentina
    case AM = 'AM'; // Armenia
    case AW = 'AW'; // Aruba
    case AU = 'AU'; // Australia
    case AT = 'AT'; // Austria
    case AZ = 'AZ'; // Azerbaijan
    case BS = 'BS'; // Bahamas
    case BH = 'BH'; // Bahrain
    case BD = 'BD'; // Bangladesh
    case BB = 'BB'; // Barbados
    case BY = 'BY'; // Belarus
    case BE = 'BE'; // Belgium
    case BZ = 'BZ'; // Belize
    case BJ = 'BJ'; // Benin
    case BM = 'BM'; // Bermuda
    case BT = 'BT'; // Bhutan
    case BO = 'BO'; // Bolivia
    case BQ = 'BQ'; // Bonaire, Sint Eustatius and Saba
    case BA = 'BA'; // Bosnia and Herzegovina
    case BW = 'BW'; // Botswana
    case BV = 'BV'; // Bouvet Island
    case BR = 'BR'; // Brazil
    case IO = 'IO'; // British Indian Ocean Territory
    case BN = 'BN'; // Brunei Darussalam
    case BG = 'BG'; // Bulgaria
    case BF = 'BF'; // Burkina Faso
    case BI = 'BI'; // Burundi
    case KH = 'KH'; // Cambodia
    case CM = 'CM'; // Cameroon
    case CA = 'CA'; // Canada
    case CV = 'CV'; // Cape Verde
    case KY = 'KY'; // Cayman Islands
    case CF = 'CF'; // Central African Republic
    case TD = 'TD'; // Chad
    case CL = 'CL'; // Chile
    case CN = 'CN'; // China
    case CX = 'CX'; // Christmas Island
    case CC = 'CC'; // Cocos (Keeling) Islands
    case CO = 'CO'; // Colombia
    case KM = 'KM'; // Comoros
    case CG = 'CG'; // Republic of the (Brazzaville) Congo
    case CD = 'CD'; // The Democratic Republic of the (Kinshasa) Congo
    case CK = 'CK'; // Cook Islands
    case CR = 'CR'; // Costa Rica
    case CI = 'CI'; // Republic of Côte d'Ivoire
    case HR = 'HR'; // Croatia
    case CU = 'CU'; // Cuba
    case CW = 'CW'; // Curaçao
    case CY = 'CY'; // Cyprus
    case CZ = 'CZ'; // Czech Republic
    case DK = 'DK'; // Denmark
    case DJ = 'DJ'; // Djibouti
    case DM = 'DM'; // Dominica
    case DO = 'DO'; // Dominican Republic
    case EC = 'EC'; // Ecuador
    case EG = 'EG'; // Egypt
    case SV = 'SV'; // El Salvador
    case GQ = 'GQ'; // Equatorial Guinea
    case ER = 'ER'; // Eritrea
    case EE = 'EE'; // Estonia
    case ET = 'ET'; // Ethiopia
    case FK = 'FK'; // Falkland Islands (Islas Malvinas)
    case FO = 'FO'; // Faroe Islands
    case FJ = 'FJ'; // Fiji
    case FI = 'FI'; // Finland
    case FR = 'FR'; // France
    case GF = 'GF'; // French Guiana
    case PF = 'PF'; // French Polynesia
    case TF = 'TF'; // French Southern and Antarctic Lands
    case GA = 'GA'; // Gabon
    case GM = 'GM'; // The Gambia
    case GE = 'GE'; // Georgia
    case DE = 'DE'; // Germany
    case GH = 'GH'; // Ghana
    case GI = 'GI'; // Gibraltar
    case GR = 'GR'; // Greece
    case GL = 'GL'; // Greenland
    case GD = 'GD'; // Grenada
    case GP = 'GP'; // Guadeloupe
    case GU = 'GU'; // Guam
    case GT = 'GT'; // Guatemala
    case GG = 'GG'; // Guernsey
    case GN = 'GN'; // Guinea
    case GW = 'GW'; // Guinea-Bissau
    case GY = 'GY'; // Guyana
    case HT = 'HT'; // Haiti
    case HM = 'HM'; // Heard Island and McDonald Islands
    case VA = 'VA'; // Holy See (Vatican City)
    case HN = 'HN'; // Honduras
    case HK = 'HK'; // Hong Kong
    case HU = 'HU'; // Hungary
    case IS = 'IS'; // Iceland
    case IN = 'IN'; // India
    case ID = 'ID'; // Indonesia
    case IR = 'IR'; // Islamic Republic of Iran
    case IQ = 'IQ'; // Iraq
    case IE = 'IE'; // Ireland
    case IM = 'IM'; // Isle of Man
    case IL = 'IL'; // Israel
    case IT = 'IT'; // Italy
    case JM = 'JM'; // Jamaica
    case JP = 'JP'; // Japan
    case JE = 'JE'; // Jersey
    case JO = 'JO'; // Jordan
    case KZ = 'KZ'; // Kazakhstan
    case KE = 'KE'; // Kenya
    case KI = 'KI'; // Kiribati
    case KP = 'KP'; // Democratic People's Republic of Korea
    case KR = 'KR'; // Republic of Korea
    case XK = 'XK'; // Kosovo
    case KW = 'KW'; // Kuwait
    case KG = 'KG'; // Kyrgyzstan
    case LA = 'LA'; // Laos
    case LV = 'LV'; // Latvia
    case LB = 'LB'; // Lebanon
    case LS = 'LS'; // Lesotho
    case LR = 'LR'; // Liberia
    case LY = 'LY'; // Libya
    case LI = 'LI'; // Liechtenstein
    case LT = 'LT'; // Lithuania
    case LU = 'LU'; // Luxembourg
    case MO = 'MO'; // Macao
    case MK = 'MK'; // Republic of Macedonia
    case MG = 'MG'; // Madagascar
    case MW = 'MW'; // Malawi
    case MY = 'MY'; // Malaysia
    case MV = 'MV'; // Maldives
    case ML = 'ML'; // Mali
    case MT = 'MT'; // Malta
    case MH = 'MH'; // Marshall Islands
    case MQ = 'MQ'; // Martinique
    case MR = 'MR'; // Mauritania
    case MU = 'MU'; // Mauritius
    case YT = 'YT'; // Mayotte
    case MX = 'MX'; // Mexico
    case FM = 'FM'; // Federated States of Micronesia
    case MD = 'MD'; // Moldova
    case MC = 'MC'; // Monaco
    case MN = 'MN'; // Mongolia
    case ME = 'ME'; // Montenegro
    case MS = 'MS'; // Montserrat
    case MA = 'MA'; // Morocco
    case MZ = 'MZ'; // Mozambique
    case MM = 'MM'; // Myanmar
    case NA = 'NA'; // Namibia
    case NR = 'NR'; // Nauru
    case NP = 'NP'; // Nepal
    case NL = 'NL'; // Netherlands
    case NC = 'NC'; // New Caledonia
    case NZ = 'NZ'; // New Zealand
    case NI = 'NI'; // Nicaragua
    case NE = 'NE'; // Niger
    case NG = 'NG'; // Nigeria
    case NU = 'NU'; // Niue
    case NF = 'NF'; // Norfolk Island
    case MP = 'MP'; // Northern Mariana Islands
    case NO = 'NO'; // Norway
    case OM = 'OM'; // Oman
    case PK = 'PK'; // Pakistan
    case PW = 'PW'; // Palau
    case PS = 'PS'; // State of Palestine
    case PA = 'PA'; // Panama
    case PG = 'PG'; // Papua New Guinea
    case PY = 'PY'; // Paraguay
    case PE = 'PE'; // Peru
    case PH = 'PH'; // Philippines
    case PN = 'PN'; // Pitcairn
    case PL = 'PL'; // Poland
    case PT = 'PT'; // Portugal
    case PR = 'PR'; // Puerto Rico
    case QA = 'QA'; // Qatar
    case RE = 'RE'; // Réunion
    case RO = 'RO'; // Romania
    case RU = 'RU'; // Russian Federation
    case RW = 'RW'; // Rwanda
    case BL = 'BL'; // Saint Barthélemy
    case SH = 'SH'; // Saint Helena, Ascension and Tristan da Cunha
    case KN = 'KN'; // Saint Kitts and Nevis
    case LC = 'LC'; // Saint Lucia
    case MF = 'MF'; // Saint Martin
    case PM = 'PM'; // Saint Pierre and Miquelon
    case VC = 'VC'; // Saint Vincent and the Grenadines
    case WS = 'WS'; // Samoa
    case SM = 'SM'; // San Marino
    case ST = 'ST'; // Sao Tome and Principe
    case SA = 'SA'; // Saudi Arabia
    case SN = 'SN'; // Senegal
    case RS = 'RS'; // Serbia
    case SC = 'SC'; // Seychelles
    case SL = 'SL'; // Sierra Leone
    case SG = 'SG'; // Singapore
    case SX = 'SX'; // Sint Maarten (Dutch part)
    case SK = 'SK'; // Slovakia
    case SI = 'SI'; // Slovenia
    case SB = 'SB'; // Solomon Islands
    case SO = 'SO'; // Somalia
    case ZA = 'ZA'; // South Africa
    case GS = 'GS'; // South Georgia and South Sandwich Islands
    case SS = 'SS'; // South Sudan
    case ES = 'ES'; // Spain
    case LK = 'LK'; // Sri Lanka
    case SD = 'SD'; // Sudan
    case SR = 'SR'; // Suriname
    case SZ = 'SZ'; // Eswatini
    case SE = 'SE'; // Sweden
    case CH = 'CH'; // Switzerland
    case SY = 'SY'; // Syrian Arab Republic
    case TW = 'TW'; // Taiwan
    case TJ = 'TJ'; // Tajikistan
    case TZ = 'TZ'; // United Republic of Tanzania
    case TH = 'TH'; // Thailand
    case TL = 'TL'; // Timor-Leste
    case TG = 'TG'; // Togo
    case TK = 'TK'; // Tokelau
    case TO = 'TO'; // Tonga
    case TT = 'TT'; // Trinidad and Tobago
    case TN = 'TN'; // Tunisia
    case TR = 'TR'; // Turkey
    case TM = 'TM'; // Turkmenistan
    case TC = 'TC'; // Turks and Caicos Islands
    case TV = 'TV'; // Tuvalu
    case UG = 'UG'; // Uganda
    case UA = 'UA'; // Ukraine
    case AE = 'AE'; // United Arab Emirates
    case GB = 'GB'; // United Kingdom
    case US = 'US'; // United States
    case UM = 'UM'; // United States Minor Outlying Islands
    case UY = 'UY'; // Uruguay
    case UZ = 'UZ'; // Uzbekistan
    case VU = 'VU'; // Vanuatu
    case VE = 'VE'; // Bolivarian Republic of Venezuela
    case VN = 'VN'; // Vietnam
    case VG = 'VG'; // Virgin Islands, British
    case VI = 'VI'; // Virgin Islands, U.S.
    case WF = 'WF'; // Wallis and Futuna
    case EH = 'EH'; // Western Sahara
    case YE = 'YE'; // Yemen
    case ZM = 'ZM'; // Zambia
    case ZW = 'ZW'; // Zimbabwe

    /**
     * Get all the regions that belong to this country
     *
     * @return array<Region>
     */
    public function regions(): array
    {
        return array_values(
            array_filter(
                Region::cases(),
                fn (Region $region) => ($this->value === $region->countryCode()),
            )
        );
    }

    /**
     * Get all the regions that belong to this country
     *
     * @requires Laravel
     * @return Collection<Region>
     */
    public function collectRegions(): Collection
    {
        if (!class_exists(Collection::class)) {
            throw LaravelNotFoundException::classMissing(Collection::class);
        }

        return Collection::make($this->regions());
    }

    /**
     * Cast this Country to array format
     */
    public function toArray(): array
    {
        return [
            'label' => $this->label(),
            'value' => $this->value,
            'regions' => array_map(fn (Region $region) => $region->toArray(), $this->regions()),
            'code' => $this->code(),
        ];
    }

    /**
     * Get a random Country
     */
    public static function random(): Country
    {
        $cases = static::cases();

        return $cases[random_int(0, count($cases) - 1)];
    }

    /**
     * Get all available country values (e.g. 'AU')
     \*
     * @return array<string>
     */
    public static function getValues(): array
    {
        return array_map(fn (Country $country) => $country->value, static::cases());
    }

    /**
     * Get all available country values (e.g. 'AU') as a collection
     *
     * @requires Laravel
     * @return Collection<string>
     */
    public static function collectValues(): Collection
    {
        if (!class_exists(Collection::class)) {
            throw LaravelNotFoundException::classMissing(Collection::class);
        }

        return Collection::make(static::getValues());
    }

    /**
     * Get all available region codes for the given country
     \*
     * @return array<string>
     */
    public function getRegionValues(): array
    {
        return array_map(fn (Region $region) => $region->value, $this->regions());
    }

    /**
     * Get all available region codes for the given country as a collection
     *
     * @requires Laravel
     * @return Collection<string>
     */
    public function collectRegionValues(): Collection
    {
        if (!class_exists(Collection::class)) {
            throw LaravelNotFoundException::classMissing(Collection::class);
        }

        return Collection::make($this->getRegionValues());
    }

    /**
     * Get all options in key-value (code => label) pairs
     \*
     * @return array<string, string>
     */
    public static function getOptions(): array
    {
        $options = [];

        foreach (static::cases() as $country) {
            $options[$country->value] = $country->label();
        }

        return $options;
    }

    /**
     * Get all options in key-value (code => label) pairs as a collection
     *
     * @requires Laravel
     * @return Collection<string, string>
     */
    public static function collectOptions(): Collection
    {
        if (!class_exists(Collection::class)) {
            throw LaravelNotFoundException::classMissing(Collection::class);
        }

        return Collection::make(static::getOptions());
    }

    /**
     * Get the path to the SVG flag for the country if it exists
     *
     * @return string|null
     */
    public function svgFlag(): string
    {
        $path = sprintf(__DIR__ . '/../flags/svg/%s.svg', strtolower($this->value));

        return ($path = realpath($path)) ? $path : null;
    }

    /**
     * Get the contents of the SVG (the XML)
     */
    public function svgFlagContents(): ?string
    {
        return ($svg = $this->svgFlag()) ? file_get_contents($svg) : null;
    }

    /**
     * Get the path to the PNG flag for this country if it exists
     */
    public function pngFlag(int $width = 100): ?string
    {
        if ($width > 250) {
            $width = 1000;
        } elseif ($width > 100) {
            $width = 250;
        } else {
            $width = 100;
        }

        $path = sprintf(__DIR__ . '/../flags/png%dpx/%s.png', $width, strtolower($this->value));

        return ($path = realpath($path)) ? $path : null;
    }

    /**
     * Get the contents of the PNG
     */
    public function pngFlagContents(int $width = 100): ?string
    {
        return ($svg = $this->pngFlag($width)) ? file_get_contents($svg) : null;
    }

    /**
     * Convert the given code to a Country, or throw an exception
     *
     * @throws EnumNotFoundException
     */
    public static function fromCode(string $code): Country
    {
        foreach (static::cases() as $country) {
            if ($country->code() === $code) {
                return $country;
            }
        }

        throw EnumNotFoundException::codeNotFound($code, 'Country');
    }

    /**
     * Try to convert the given code to a Country, null if not valid
     */
    public static function tryFromCode(string $code): ?Country
    {
        try {
            return static::fromCode($code);
        } catch (EnumNotFoundException) {
            return null;
        }
    }

    /**
     * Get all country enums in an Illuminate\Support\Collection
     *
     * @requires Laravel
     * @return \Ilumminate\Support\Collection<Country>
     */
    public static function collect(): Collection
    {
        if (!class_exists(Collection::class)) {
            throw LaravelNotFoundException::classMissing(Collection::class);
        }

        return Collection::make(static::cases());
    }

    /**
     * Get the validation for this enum
     */
    public static function enumRule(): Enum
    {
        if (!class_exists(Enum::class)) {
            throw LaravelNotFoundException::classMissing(Enum::class);
        }

        return new Enum(static::class);
    }

    /**
     * Get the validation for the enum's values
     */
    public static function inRule(): In
    {
        if (!class_exists(In::class)) {
            throw LaravelNotFoundException::classMissing(In::class);
        }

        return new In(static::getValues());
    }

    /**
     * Parse the given country to a Country enum instance, or throw an exception it doesn't exist
     *
     * @throws EnumNotFoundException
     */
    public static function parse(string|Country|null $value): Country
    {
        if ($value === null) {
            throw EnumNotFoundException::valueNotFound($value, 'Country');
        }

        if ($value instanceof Country) {
            return $value;
        }

        try {
            return static::from($value);
        } catch (ValueError) {
            throw EnumNotFoundException::valueNotFound($value, 'Country');
        }
    }

    /**
     * Try to parse the given country value to a Country enum instance of null if it doesn't exist
     */
    public static function tryParse(string|Country|null $value): ?Country
    {
        try {
            return static::parse($value);
        } catch (EnumNotFoundException) {
            return null;
        }
    }

    /**
     * Convert this to JSON
     *
     * @param int $options Flags for json_encode, e.g. JSON_PRETTY_PRINT
     */
    public function toJson($options = 0): string
    {
        return json_encode($this->toArray(), $options);
    }

    /**
     * Get the human-readable label of this country
     */
    public function label(): string
    {
        return match ($this) {
            static::AF => "Afghanistan",
            static::AX => "Åland Islands",
            static::AL => "Albania",
            static::DZ => "Algeria",
            static::AS => "American Samoa",
            static::AD => "Andorra",
            static::AO => "Angola",
            static::AI => "Anguilla",
            static::AQ => "Antarctica",
            static::AG => "Antigua and Barbuda",
            static::AR => "Argentina",
            static::AM => "Armenia",
            static::AW => "Aruba",
            static::AU => "Australia",
            static::AT => "Austria",
            static::AZ => "Azerbaijan",
            static::BS => "Bahamas",
            static::BH => "Bahrain",
            static::BD => "Bangladesh",
            static::BB => "Barbados",
            static::BY => "Belarus",
            static::BE => "Belgium",
            static::BZ => "Belize",
            static::BJ => "Benin",
            static::BM => "Bermuda",
            static::BT => "Bhutan",
            static::BO => "Bolivia",
            static::BQ => "Bonaire, Sint Eustatius and Saba",
            static::BA => "Bosnia and Herzegovina",
            static::BW => "Botswana",
            static::BV => "Bouvet Island",
            static::BR => "Brazil",
            static::IO => "British Indian Ocean Territory",
            static::BN => "Brunei Darussalam",
            static::BG => "Bulgaria",
            static::BF => "Burkina Faso",
            static::BI => "Burundi",
            static::KH => "Cambodia",
            static::CM => "Cameroon",
            static::CA => "Canada",
            static::CV => "Cape Verde",
            static::KY => "Cayman Islands",
            static::CF => "Central African Republic",
            static::TD => "Chad",
            static::CL => "Chile",
            static::CN => "China",
            static::CX => "Christmas Island",
            static::CC => "Cocos (Keeling) Islands",
            static::CO => "Colombia",
            static::KM => "Comoros",
            static::CG => "Republic of the (Brazzaville) Congo",
            static::CD => "The Democratic Republic of the (Kinshasa) Congo",
            static::CK => "Cook Islands",
            static::CR => "Costa Rica",
            static::CI => "Republic of Côte d'Ivoire",
            static::HR => "Croatia",
            static::CU => "Cuba",
            static::CW => "Curaçao",
            static::CY => "Cyprus",
            static::CZ => "Czech Republic",
            static::DK => "Denmark",
            static::DJ => "Djibouti",
            static::DM => "Dominica",
            static::DO => "Dominican Republic",
            static::EC => "Ecuador",
            static::EG => "Egypt",
            static::SV => "El Salvador",
            static::GQ => "Equatorial Guinea",
            static::ER => "Eritrea",
            static::EE => "Estonia",
            static::ET => "Ethiopia",
            static::FK => "Falkland Islands (Islas Malvinas)",
            static::FO => "Faroe Islands",
            static::FJ => "Fiji",
            static::FI => "Finland",
            static::FR => "France",
            static::GF => "French Guiana",
            static::PF => "French Polynesia",
            static::TF => "French Southern and Antarctic Lands",
            static::GA => "Gabon",
            static::GM => "The Gambia",
            static::GE => "Georgia",
            static::DE => "Germany",
            static::GH => "Ghana",
            static::GI => "Gibraltar",
            static::GR => "Greece",
            static::GL => "Greenland",
            static::GD => "Grenada",
            static::GP => "Guadeloupe",
            static::GU => "Guam",
            static::GT => "Guatemala",
            static::GG => "Guernsey",
            static::GN => "Guinea",
            static::GW => "Guinea-Bissau",
            static::GY => "Guyana",
            static::HT => "Haiti",
            static::HM => "Heard Island and McDonald Islands",
            static::VA => "Holy See (Vatican City)",
            static::HN => "Honduras",
            static::HK => "Hong Kong",
            static::HU => "Hungary",
            static::IS => "Iceland",
            static::IN => "India",
            static::ID => "Indonesia",
            static::IR => "Islamic Republic of Iran",
            static::IQ => "Iraq",
            static::IE => "Ireland",
            static::IM => "Isle of Man",
            static::IL => "Israel",
            static::IT => "Italy",
            static::JM => "Jamaica",
            static::JP => "Japan",
            static::JE => "Jersey",
            static::JO => "Jordan",
            static::KZ => "Kazakhstan",
            static::KE => "Kenya",
            static::KI => "Kiribati",
            static::KP => "Democratic People's Republic of Korea",
            static::KR => "Republic of Korea",
            static::XK => "Kosovo",
            static::KW => "Kuwait",
            static::KG => "Kyrgyzstan",
            static::LA => "Laos",
            static::LV => "Latvia",
            static::LB => "Lebanon",
            static::LS => "Lesotho",
            static::LR => "Liberia",
            static::LY => "Libya",
            static::LI => "Liechtenstein",
            static::LT => "Lithuania",
            static::LU => "Luxembourg",
            static::MO => "Macao",
            static::MK => "Republic of Macedonia",
            static::MG => "Madagascar",
            static::MW => "Malawi",
            static::MY => "Malaysia",
            static::MV => "Maldives",
            static::ML => "Mali",
            static::MT => "Malta",
            static::MH => "Marshall Islands",
            static::MQ => "Martinique",
            static::MR => "Mauritania",
            static::MU => "Mauritius",
            static::YT => "Mayotte",
            static::MX => "Mexico",
            static::FM => "Federated States of Micronesia",
            static::MD => "Moldova",
            static::MC => "Monaco",
            static::MN => "Mongolia",
            static::ME => "Montenegro",
            static::MS => "Montserrat",
            static::MA => "Morocco",
            static::MZ => "Mozambique",
            static::MM => "Myanmar",
            static::NA => "Namibia",
            static::NR => "Nauru",
            static::NP => "Nepal",
            static::NL => "Netherlands",
            static::NC => "New Caledonia",
            static::NZ => "New Zealand",
            static::NI => "Nicaragua",
            static::NE => "Niger",
            static::NG => "Nigeria",
            static::NU => "Niue",
            static::NF => "Norfolk Island",
            static::MP => "Northern Mariana Islands",
            static::NO => "Norway",
            static::OM => "Oman",
            static::PK => "Pakistan",
            static::PW => "Palau",
            static::PS => "State of Palestine",
            static::PA => "Panama",
            static::PG => "Papua New Guinea",
            static::PY => "Paraguay",
            static::PE => "Peru",
            static::PH => "Philippines",
            static::PN => "Pitcairn",
            static::PL => "Poland",
            static::PT => "Portugal",
            static::PR => "Puerto Rico",
            static::QA => "Qatar",
            static::RE => "Réunion",
            static::RO => "Romania",
            static::RU => "Russian Federation",
            static::RW => "Rwanda",
            static::BL => "Saint Barthélemy",
            static::SH => "Saint Helena, Ascension and Tristan da Cunha",
            static::KN => "Saint Kitts and Nevis",
            static::LC => "Saint Lucia",
            static::MF => "Saint Martin",
            static::PM => "Saint Pierre and Miquelon",
            static::VC => "Saint Vincent and the Grenadines",
            static::WS => "Samoa",
            static::SM => "San Marino",
            static::ST => "Sao Tome and Principe",
            static::SA => "Saudi Arabia",
            static::SN => "Senegal",
            static::RS => "Serbia",
            static::SC => "Seychelles",
            static::SL => "Sierra Leone",
            static::SG => "Singapore",
            static::SX => "Sint Maarten (Dutch part)",
            static::SK => "Slovakia",
            static::SI => "Slovenia",
            static::SB => "Solomon Islands",
            static::SO => "Somalia",
            static::ZA => "South Africa",
            static::GS => "South Georgia and South Sandwich Islands",
            static::SS => "South Sudan",
            static::ES => "Spain",
            static::LK => "Sri Lanka",
            static::SD => "Sudan",
            static::SR => "Suriname",
            static::SZ => "Eswatini",
            static::SE => "Sweden",
            static::CH => "Switzerland",
            static::SY => "Syrian Arab Republic",
            static::TW => "Taiwan",
            static::TJ => "Tajikistan",
            static::TZ => "United Republic of Tanzania",
            static::TH => "Thailand",
            static::TL => "Timor-Leste",
            static::TG => "Togo",
            static::TK => "Tokelau",
            static::TO => "Tonga",
            static::TT => "Trinidad and Tobago",
            static::TN => "Tunisia",
            static::TR => "Turkey",
            static::TM => "Turkmenistan",
            static::TC => "Turks and Caicos Islands",
            static::TV => "Tuvalu",
            static::UG => "Uganda",
            static::UA => "Ukraine",
            static::AE => "United Arab Emirates",
            static::GB => "United Kingdom",
            static::US => "United States",
            static::UM => "United States Minor Outlying Islands",
            static::UY => "Uruguay",
            static::UZ => "Uzbekistan",
            static::VU => "Vanuatu",
            static::VE => "Bolivarian Republic of Venezuela",
            static::VN => "Vietnam",
            static::VG => "Virgin Islands, British",
            static::VI => "Virgin Islands, U.S.",
            static::WF => "Wallis and Futuna",
            static::EH => "Western Sahara",
            static::YE => "Yemen",
            static::ZM => "Zambia",
            static::ZW => "Zimbabwe",
        };
    }

    /**
     * Get the code (English-version snake_case) for this Country
     */
    public function code(): string
    {
        return match ($this) {
            static::AF => "afghanistan",
            static::AX => "aland_islands",
            static::AL => "albania",
            static::DZ => "algeria",
            static::AS => "american_samoa",
            static::AD => "andorra",
            static::AO => "angola",
            static::AI => "anguilla",
            static::AQ => "antarctica",
            static::AG => "antigua_and_barbuda",
            static::AR => "argentina",
            static::AM => "armenia",
            static::AW => "aruba",
            static::AU => "australia",
            static::AT => "austria",
            static::AZ => "azerbaijan",
            static::BS => "bahamas",
            static::BH => "bahrain",
            static::BD => "bangladesh",
            static::BB => "barbados",
            static::BY => "belarus",
            static::BE => "belgium",
            static::BZ => "belize",
            static::BJ => "benin",
            static::BM => "bermuda",
            static::BT => "bhutan",
            static::BO => "bolivia",
            static::BQ => "bonaire_sint_eustatius_and_saba",
            static::BA => "bosnia_and_herzegovina",
            static::BW => "botswana",
            static::BV => "bouvet_island",
            static::BR => "brazil",
            static::IO => "british_indian_ocean_territory",
            static::BN => "brunei_darussalam",
            static::BG => "bulgaria",
            static::BF => "burkina_faso",
            static::BI => "burundi",
            static::KH => "cambodia",
            static::CM => "cameroon",
            static::CA => "canada",
            static::CV => "cape_verde",
            static::KY => "cayman_islands",
            static::CF => "central_african_republic",
            static::TD => "chad",
            static::CL => "chile",
            static::CN => "china",
            static::CX => "christmas_island",
            static::CC => "cocos_keeling_islands",
            static::CO => "colombia",
            static::KM => "comoros",
            static::CG => "republic_of_the_brazzaville_congo",
            static::CD => "the_democratic_republic_of_the_kinshasa_congo",
            static::CK => "cook_islands",
            static::CR => "costa_rica",
            static::CI => "republic_of_cote_divoire",
            static::HR => "croatia",
            static::CU => "cuba",
            static::CW => "curacao",
            static::CY => "cyprus",
            static::CZ => "czech_republic",
            static::DK => "denmark",
            static::DJ => "djibouti",
            static::DM => "dominica",
            static::DO => "dominican_republic",
            static::EC => "ecuador",
            static::EG => "egypt",
            static::SV => "el_salvador",
            static::GQ => "equatorial_guinea",
            static::ER => "eritrea",
            static::EE => "estonia",
            static::ET => "ethiopia",
            static::FK => "falkland_islands_islas_malvinas",
            static::FO => "faroe_islands",
            static::FJ => "fiji",
            static::FI => "finland",
            static::FR => "france",
            static::GF => "french_guiana",
            static::PF => "french_polynesia",
            static::TF => "french_southern_and_antarctic_lands",
            static::GA => "gabon",
            static::GM => "the_gambia",
            static::GE => "georgia",
            static::DE => "germany",
            static::GH => "ghana",
            static::GI => "gibraltar",
            static::GR => "greece",
            static::GL => "greenland",
            static::GD => "grenada",
            static::GP => "guadeloupe",
            static::GU => "guam",
            static::GT => "guatemala",
            static::GG => "guernsey",
            static::GN => "guinea",
            static::GW => "guinea_bissau",
            static::GY => "guyana",
            static::HT => "haiti",
            static::HM => "heard_island_and_mcdonald_islands",
            static::VA => "holy_see_vatican_city",
            static::HN => "honduras",
            static::HK => "hong_kong",
            static::HU => "hungary",
            static::IS => "iceland",
            static::IN => "india",
            static::ID => "indonesia",
            static::IR => "islamic_republic_of_iran",
            static::IQ => "iraq",
            static::IE => "ireland",
            static::IM => "isle_of_man",
            static::IL => "israel",
            static::IT => "italy",
            static::JM => "jamaica",
            static::JP => "japan",
            static::JE => "jersey",
            static::JO => "jordan",
            static::KZ => "kazakhstan",
            static::KE => "kenya",
            static::KI => "kiribati",
            static::KP => "democratic_peoples_republic_of_korea",
            static::KR => "republic_of_korea",
            static::XK => "kosovo",
            static::KW => "kuwait",
            static::KG => "kyrgyzstan",
            static::LA => "laos",
            static::LV => "latvia",
            static::LB => "lebanon",
            static::LS => "lesotho",
            static::LR => "liberia",
            static::LY => "libya",
            static::LI => "liechtenstein",
            static::LT => "lithuania",
            static::LU => "luxembourg",
            static::MO => "macao",
            static::MK => "republic_of_macedonia",
            static::MG => "madagascar",
            static::MW => "malawi",
            static::MY => "malaysia",
            static::MV => "maldives",
            static::ML => "mali",
            static::MT => "malta",
            static::MH => "marshall_islands",
            static::MQ => "martinique",
            static::MR => "mauritania",
            static::MU => "mauritius",
            static::YT => "mayotte",
            static::MX => "mexico",
            static::FM => "federated_states_of_micronesia",
            static::MD => "moldova",
            static::MC => "monaco",
            static::MN => "mongolia",
            static::ME => "montenegro",
            static::MS => "montserrat",
            static::MA => "morocco",
            static::MZ => "mozambique",
            static::MM => "myanmar",
            static::NA => "namibia",
            static::NR => "nauru",
            static::NP => "nepal",
            static::NL => "netherlands",
            static::NC => "new_caledonia",
            static::NZ => "new_zealand",
            static::NI => "nicaragua",
            static::NE => "niger",
            static::NG => "nigeria",
            static::NU => "niue",
            static::NF => "norfolk_island",
            static::MP => "northern_mariana_islands",
            static::NO => "norway",
            static::OM => "oman",
            static::PK => "pakistan",
            static::PW => "palau",
            static::PS => "state_of_palestine",
            static::PA => "panama",
            static::PG => "papua_new_guinea",
            static::PY => "paraguay",
            static::PE => "peru",
            static::PH => "philippines",
            static::PN => "pitcairn",
            static::PL => "poland",
            static::PT => "portugal",
            static::PR => "puerto_rico",
            static::QA => "qatar",
            static::RE => "reunion",
            static::RO => "romania",
            static::RU => "russian_federation",
            static::RW => "rwanda",
            static::BL => "saint_barthelemy",
            static::SH => "saint_helena_ascension_and_tristan_da_cunha",
            static::KN => "saint_kitts_and_nevis",
            static::LC => "saint_lucia",
            static::MF => "saint_martin",
            static::PM => "saint_pierre_and_miquelon",
            static::VC => "saint_vincent_and_the_grenadines",
            static::WS => "samoa",
            static::SM => "san_marino",
            static::ST => "sao_tome_and_principe",
            static::SA => "saudi_arabia",
            static::SN => "senegal",
            static::RS => "serbia",
            static::SC => "seychelles",
            static::SL => "sierra_leone",
            static::SG => "singapore",
            static::SX => "sint_maarten_dutch_part",
            static::SK => "slovakia",
            static::SI => "slovenia",
            static::SB => "solomon_islands",
            static::SO => "somalia",
            static::ZA => "south_africa",
            static::GS => "south_georgia_and_south_sandwich_islands",
            static::SS => "south_sudan",
            static::ES => "spain",
            static::LK => "sri_lanka",
            static::SD => "sudan",
            static::SR => "suriname",
            static::SZ => "eswatini",
            static::SE => "sweden",
            static::CH => "switzerland",
            static::SY => "syrian_arab_republic",
            static::TW => "taiwan",
            static::TJ => "tajikistan",
            static::TZ => "united_republic_of_tanzania",
            static::TH => "thailand",
            static::TL => "timor_leste",
            static::TG => "togo",
            static::TK => "tokelau",
            static::TO => "tonga",
            static::TT => "trinidad_and_tobago",
            static::TN => "tunisia",
            static::TR => "turkey",
            static::TM => "turkmenistan",
            static::TC => "turks_and_caicos_islands",
            static::TV => "tuvalu",
            static::UG => "uganda",
            static::UA => "ukraine",
            static::AE => "united_arab_emirates",
            static::GB => "united_kingdom",
            static::US => "united_states",
            static::UM => "united_states_minor_outlying_islands",
            static::UY => "uruguay",
            static::UZ => "uzbekistan",
            static::VU => "vanuatu",
            static::VE => "bolivarian_republic_of_venezuela",
            static::VN => "vietnam",
            static::VG => "virgin_islands_british",
            static::VI => "virgin_islands_us",
            static::WF => "wallis_and_futuna",
            static::EH => "western_sahara",
            static::YE => "yemen",
            static::ZM => "zambia",
            static::ZW => "zimbabwe",
        };
    }
}
