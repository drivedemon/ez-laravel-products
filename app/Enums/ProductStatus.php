<?php

namespace App\Enums;

enum ProductStatus: int
{
    case DRAFT = 0;
    case ON_SALE = 10;

    public function label(): string
    {
        return match ($this) {
            self::DRAFT => 'Draft',
            self::ON_SALE => 'OnSale',
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