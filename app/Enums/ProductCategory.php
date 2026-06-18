<?php

namespace App\Enums;

enum ProductCategory: string
{
    case Newborns = 'newborns';
    case Toddlers = 'toddlers';
    case Preschoolers = 'preschoolers';
    case SchoolAge = 'school_age';

    public function label(): string
    {
        return match ($this) {
            self::Newborns => 'Newborns',
            self::Toddlers => 'Toddlers',
            self::Preschoolers => 'Preschoolers',
            self::SchoolAge => 'School Age',
        };
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
