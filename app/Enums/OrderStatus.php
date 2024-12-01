<?php

namespace App\Enums;

enum OrderStatus: int
{
    case PROCESSING = 0;
    case COMPLETED = 10;

    public function label(): string
    {
        return match ($this) {
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