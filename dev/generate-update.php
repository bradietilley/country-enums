<?php

define('LOCAL_SOURCE', __DIR__ . '/data.json');
define('SOURCE', (file_exists(LOCAL_SOURCE)) ? LOCAL_SOURCE : 'https://raw.githubusercontent.com/country-regions/country-region-data/master/data.json');
define('STUB_COUNTRY', __DIR__ . '/stub/country.stub');
define('STUB_REGION', __DIR__ . '/stub/region.stub');

function transliterateString(string $txt): string
{
    $transliterationTable = [
        'á' => 'a',
        'Á' => 'A',
        'à' => 'a',
        'À' => 'A',
        'ă' => 'a',
        'Ă' => 'A',
        'â' => 'a',
        'Â' => 'A',
        'å' => 'a',
        'Å' => 'A',
        'ã' => 'a',
        'Ã' => 'A',
        'ą' => 'a',
        'Ą' => 'A',
        'ā' => 'a',
        'Ā' => 'A',
        'ä' => 'ae',
        'Ä' => 'AE',
        'æ' => 'ae',
        'Æ' => 'AE',
        'ḃ' => 'b',
        'Ḃ' => 'B',
        'ć' => 'c',
        'Ć' => 'C',
        'ĉ' => 'c',
        'Ĉ' => 'C',
        'č' => 'c',
        'Č' => 'C',
        'ċ' => 'c',
        'Ċ' => 'C',
        'ç' => 'c',
        'Ç' => 'C',
        'ď' => 'd',
        'Ď' => 'D',
        'ḋ' => 'd',
        'Ḋ' => 'D',
        'đ' => 'd',
        'Đ' => 'D',
        'ð' => 'dh',
        'Ð' => 'Dh',
        'é' => 'e',
        'É' => 'E',
        'è' => 'e',
        'È' => 'E',
        'ĕ' => 'e',
        'Ĕ' => 'E',
        'ê' => 'e',
        'Ê' => 'E',
        'ě' => 'e',
        'Ě' => 'E',
        'ë' => 'e',
        'Ë' => 'E',
        'ė' => 'e',
        'Ė' => 'E',
        'ę' => 'e',
        'Ę' => 'E',
        'ē' => 'e',
        'Ē' => 'E',
        'ḟ' => 'f',
        'Ḟ' => 'F',
        'ƒ' => 'f',
        'Ƒ' => 'F',
        'ğ' => 'g',
        'Ğ' => 'G',
        'ĝ' => 'g',
        'Ĝ' => 'G',
        'ġ' => 'g',
        'Ġ' => 'G',
        'ģ' => 'g',
        'Ģ' => 'G',
        'ĥ' => 'h',
        'Ĥ' => 'H',
        'ħ' => 'h',
        'Ħ' => 'H',
        'í' => 'i',
        'Í' => 'I',
        'ì' => 'i',
        'Ì' => 'I',
        'î' => 'i',
        'Î' => 'I',
        'ï' => 'i',
        'Ï' => 'I',
        'ĩ' => 'i',
        'Ĩ' => 'I',
        'į' => 'i',
        'Į' => 'I',
        'ī' => 'i',
        'Ī' => 'I',
        'ĵ' => 'j',
        'Ĵ' => 'J',
        'ķ' => 'k',
        'Ķ' => 'K',
        'ĺ' => 'l',
        'Ĺ' => 'L',
        'ľ' => 'l',
        'Ľ' => 'L',
        'ļ' => 'l',
        'Ļ' => 'L',
        'ł' => 'l',
        'Ł' => 'L',
        'ṁ' => 'm',
        'Ṁ' => 'M',
        'ń' => 'n',
        'Ń' => 'N',
        'ň' => 'n',
        'Ň' => 'N',
        'ñ' => 'n',
        'Ñ' => 'N',
        'ņ' => 'n',
        'Ņ' => 'N',
        'ó' => 'o',
        'Ó' => 'O',
        'ò' => 'o',
        'Ò' => 'O',
        'ô' => 'o',
        'Ô' => 'O',
        'ő' => 'o',
        'Ő' => 'O',
        'õ' => 'o',
        'Õ' => 'O',
        'ø' => 'oe',
        'Ø' => 'OE',
        'ō' => 'o',
        'Ō' => 'O',
        'ơ' => 'o',
        'Ơ' => 'O',
        'ö' => 'oe',
        'Ö' => 'OE',
        'ṗ' => 'p',
        'Ṗ' => 'P',
        'ŕ' => 'r',
        'Ŕ' => 'R',
        'ř' => 'r',
        'Ř' => 'R',
        'ŗ' => 'r',
        'Ŗ' => 'R',
        'ś' => 's',
        'Ś' => 'S',
        'ŝ' => 's',
        'Ŝ' => 'S',
        'š' => 's',
        'Š' => 'S',
        'ṡ' => 's',
        'Ṡ' => 'S',
        'ş' => 's',
        'Ş' => 'S',
        'ș' => 's',
        'Ș' => 'S',
        'ß' => 'SS',
        'ť' => 't',
        'Ť' => 'T',
        'ṫ' => 't',
        'Ṫ' => 'T',
        'ţ' => 't',
        'Ţ' => 'T',
        'ț' => 't',
        'Ț' => 'T',
        'ŧ' => 't',
        'Ŧ' => 'T',
        'ú' => 'u',
        'Ú' => 'U',
        'ù' => 'u',
        'Ù' => 'U',
        'ŭ' => 'u',
        'Ŭ' => 'U',
        'û' => 'u',
        'Û' => 'U',
        'ů' => 'u',
        'Ů' => 'U',
        'ű' => 'u',
        'Ű' => 'U',
        'ũ' => 'u',
        'Ũ' => 'U',
        'ų' => 'u',
        'Ų' => 'U',
        'ū' => 'u',
        'Ū' => 'U',
        'ư' => 'u',
        'Ư' => 'U',
        'ü' => 'ue',
        'Ü' => 'UE',
        'ẃ' => 'w',
        'Ẃ' => 'W',
        'ẁ' => 'w',
        'Ẁ' => 'W',
        'ŵ' => 'w',
        'Ŵ' => 'W',
        'ẅ' => 'w',
        'Ẅ' => 'W',
        'ý' => 'y',
        'Ý' => 'Y',
        'ỳ' => 'y',
        'Ỳ' => 'Y',
        'ŷ' => 'y',
        'Ŷ' => 'Y',
        'ÿ' => 'y',
        'Ÿ' => 'Y',
        'ź' => 'z',
        'Ź' => 'Z',
        'ž' => 'z',
        'Ž' => 'Z',
        'ż' => 'z',
        'Ż' => 'Z',
        'þ' => 'th',
        'Þ' => 'Th',
        'µ' => 'u',
        'а' => 'a',
        'А' => 'a',
        'б' => 'b',
        'Б' => 'b',
        'в' => 'v',
        'В' => 'v',
        'г' => 'g',
        'Г' => 'g',
        'д' => 'd',
        'Д' => 'd',
        'е' => 'e',
        'Е' => 'E',
        'ё' => 'e',
        'Ё' => 'E',
        'ж' => 'zh',
        'Ж' => 'zh',
        'з' => 'z',
        'З' => 'z',
        'и' => 'i',
        'И' => 'i',
        'й' => 'j',
        'Й' => 'j',
        'к' => 'k',
        'К' => 'k',
        'л' => 'l',
        'Л' => 'l',
        'м' => 'm',
        'М' => 'm',
        'н' => 'n',
        'Н' => 'n',
        'о' => 'o',
        'О' => 'o',
        'п' => 'p',
        'П' => 'p',
        'р' => 'r',
        'Р' => 'r',
        'с' => 's',
        'С' => 's',
        'т' => 't',
        'Т' => 't',
        'у' => 'u',
        'У' => 'u',
        'ф' => 'f',
        'Ф' => 'f',
        'х' => 'h',
        'Х' => 'h',
        'ц' => 'c',
        'Ц' => 'c',
        'ч' => 'ch',
        'Ч' => 'ch',
        'ш' => 'sh',
        'Ш' => 'sh',
        'щ' => 'sch',
        'Щ' => 'sch',
        'ъ' => '',
        'Ъ' => '',
        'ы' => 'y',
        'Ы' => 'y',
        'ь' => '',
        'Ь' => '',
        'э' => 'e',
        'Э' => 'e',
        'ю' => 'ju',
        'Ю' => 'ju',
        'я' => 'ja',
        'Я' => 'ja'
    ];
    
    return str_replace(array_keys($transliterationTable), array_values($transliterationTable), $txt);
}

// Fetch JSON from source (local or github)
$data = json_decode(file_get_contents(SOURCE), true);

function snake_case(string $string): string
{
    $string = transliterateString($string);
    $string = strtolower($string);
    $string = str_replace(['.', "'"], '', $string);
    $string = preg_replace('/[^a-z0-9]+/', '_', $string);
    $string = trim($string, '_');

    return $string;
}

function countryName(string $label): string
{
    if (preg_match('/^(.+), (.+ of.*)$/i', $label, $m)) {
        $label = ucfirst($m[2]) . ' ' . $m[1];
    } elseif (preg_match('/^(.+), (the.*)$/i', $label, $m)) {
        $label = ucfirst($m[2]) . ' ' . $m[1];
    }

    return $label;
}

// Generate Country Enum class
$countryStub = file_get_contents(STUB_COUNTRY);
$countryLines = array_map(
    function ($line) use ($data) {
        if (preg_match('/\{(SHORT|LABEL|CODE|BREAK)\}/i', $line, $matches)) {
            $lines = [];

            foreach ($data as $country) {
                $short = $country['countryShortCode'];
                $label = countryName($country['countryName']);
                $code = snake_case($label);

                $lines[] = str_replace(
                    ['{SHORT}', '{LABEL}', '{CODE}', '{BREAK}'],
                    [$short, $label, $code, "\n"],
                    $line,
                );
            }

            $line = implode("\n", $lines);
        }

        return $line;
    },
    explode(PHP_EOL, $countryStub),
);
file_put_contents(__DIR__ . '/../src/Country.php', implode(PHP_EOL, $countryLines));

// Generate Region Enum class
$regionStub = file_get_contents(STUB_REGION);
$regionLines = array_map(
    function ($line) use ($data) {
        if (preg_match('/\{(SHORT|LABEL|CODE|BREAK|COUNTRY)\}/i', $line, $matches)) {
            $lines = [];

            foreach ($data as $country) {
                foreach ($country['regions'] as $region) {
                    // Skip if empty
                    if (empty($region['shortCode'])) {
                        continue;
                    }

                    // Ends in number = weird = skip
                    if (preg_match('/\d+$/', $region['shortCode'])) {
                        continue;
                    }

                    // Contains hyphen? skip
                    if (mb_strpos($region['shortCode'], '-') !== false) {
                        continue;
                    }

                    $countryLabel = countryName($country['countryName']);
                    $short = $country['countryShortCode'] . '_' . $region['shortCode'];
                    $label = $region['name'];
                    $code = snake_case($label);

                    $lines[] = str_replace(
                        ['{SHORT}', '{PAD}', '{LABEL}', '{CODE}', '{BREAK}', '{COUNTRY}'],
                        [$short, str_pad('', 6 - strlen($short), ' ', STR_PAD_RIGHT), $label, $code, "\n", $countryLabel],
                        $line,
                    );
                }
            }

            $line = implode("\n", $lines);
        }

        return $line;
    },
    explode(PHP_EOL, $regionStub),
);
file_put_contents(__DIR__ . '/../src/Region.php', implode(PHP_EOL, $regionLines));

echo "All done\n";