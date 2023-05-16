<?php

declare(strict_types=1);

use Rector\CodeQuality\Rector\Class_\InlineConstructorDefaultToPropertyRector;
use Rector\Config\RectorConfig;
use Rector\Php74\Rector\Closure\ClosureToArrowFunctionRector;
use Rector\Php81\Rector\Array_\FirstClassCallableRector;
use Rector\Php81\Rector\FuncCall\NullToStrictStringFuncCallArgRector;
use Rector\Set\ValueObject\LevelSetList;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->paths([
        __DIR__ . '/src',
        __DIR__ . '/dev',
        __DIR__ . '/tests',
    ]);

    // register a single rule
    $rectorConfig->rule(InlineConstructorDefaultToPropertyRector::class);

    // define sets of rules
    $rectorConfig->sets([
        LevelSetList::UP_TO_PHP_82,
    ]);

    $rectorConfig->skip([
        /**
         * Bit redundant
         */
        NullToStrictStringFuncCallArgRector::class,

        /**
         * Causes issues with `action([Controller::class, 'actionName])`
         */
        FirstClassCallableRector::class,

        /**
         * I like shorthand as much as the rest of us, but if you haven't
         * used it there might be a reason.
         */
        ClosureToArrowFunctionRector::class,
    ]);
};
