<?php

namespace App\Enums;

enum OrderStatus: int
{
    case DRAFT = 0;
    case PROCESSING = 10;
    case COMPLETED = 20;

    public function label(): string
    {
        return match ($this) {
            self::DRAFT => 'Draft',
            self::PROCESSING => 'Processing',
            self::COMPLETED => 'Completed',
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
