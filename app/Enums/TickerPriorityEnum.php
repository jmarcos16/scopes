<?php

namespace App\Enums;

enum TickerPriorityEnum: string
{
    case SUPER_LOW = 'super_low';
    case LOW = 'low';
    case MEDIUM = 'medium';
    case HIGH = 'high';

    public static function toArray(): array
    {
        return [
            self::SUPER_LOW => 'Super Low',
            self::LOW => 'Low',
            self::MEDIUM => 'Medium',
            self::HIGH => 'High',
        ];
    }

    public function description(): string
    {
        return match ($this) {
            self::SUPER_LOW => 'Super Low priority',
            self::LOW => 'Low priority',
            self::MEDIUM => 'Medium priority',
            self::HIGH => 'High priority',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::SUPER_LOW => 'blue',
            self::LOW => 'green',
            self::MEDIUM => 'yellow',
            self::HIGH => 'red',
        };
    }

}
