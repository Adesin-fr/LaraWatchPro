<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| The closure you provide to your test functions is always bound to a specific PHPUnit test
| case class. By default, that class is "PHPUnit\Framework\TestCase". Of course, you may
| need to change it using the "uses()" function to bind a different classes or traits.
|
*/

uses(TestCase::class, RefreshDatabase::class)->in('Feature');

/*
|--------------------------------------------------------------------------
| Expectations
|--------------------------------------------------------------------------
|
| When you're writing tests, you often need to check that values meet certain conditions. The
| "expect()" function gives you access to a set of "expectations" methods that you can use
| to assert different things. Of course, you may extend the Expectation API at any time.
|
*/

expect()->extend('toBeOne', function () {
    return $this->toBe(1);
});

/*
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
|
| While Pest is very powerful out-of-the-box, you may have some testing code specific to your
| project that you don't want to repeat in every file. Here you can also expose helpers as
| global functions to help you to reduce the number of lines of code in your test files.
|
*/

function getLogTestData()
{
    return [
        'level' => 'error',
        'message' => 'Class FooBar not found',
        'userId' => '01ham7pf764q5jwht4aj7h95pw',
        'file' => '/home/user/myfile.php',
        'line' => 54,
        'trace' => '#0  /thefile.php: FooController.php(54): theFunction()',
        'codeExcerpt' =>
            [
                39 => '{',
                40 => 'Alltotot();',
                41 => 'return new JsonResource(',
                42 => 'Invoice::query()',
                43 => '->whereIn(\'type\', [\'I\', \'C\'])',
                44 => '->where(\'validated\', true)',
                45 => '->where(\'status\', \'!=\', \'PAID\')',
            ]
    ];
}
