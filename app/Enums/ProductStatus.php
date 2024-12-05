<?php

namespace App\Enums;

enum ProductStatus: int
{
    case UNPUBLISHED = 0;
    case PUBLISHED = 10;

    public function label(): string
    {
        return match ($this) {
            self::UNPUBLISHED => 'Unpublished',
            self::PUBLISHED => 'Published',
        };
    }

    public static function all(): array
    {
        $cases = self::cases();

        $result = [];
        foreach ($cases as $case) {
            $result[$case->value] = $case->label();
        }

        return $result;
    }
}
