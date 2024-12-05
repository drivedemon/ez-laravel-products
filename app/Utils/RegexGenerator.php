<?php

namespace App\Utils;

use Faker\Factory;

class RegexGenerator
{
    public static function generateSixDigit(): string
    {
        $faker = Factory::create();

        return $faker->regexify('[A-Z]{6}');
    }
}
