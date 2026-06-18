<?php

namespace App\Enums;

enum BlogCategory: string
{
    case NewbornCare = 'newborn_care';
    case InfantNutrition = 'infant_nutrition';
    case SleepTraining = 'sleep_training';
    case ChildDevelopment = 'child_development';
    case Vaccinations = 'vaccinations';
    case MentalHealth = 'mental_health';

    public function label(): string
    {
        return match ($this) {
            self::NewbornCare => 'Newborn Care',
            self::InfantNutrition => 'Infant Nutrition',
            self::SleepTraining => 'Sleep Training',
            self::ChildDevelopment => 'Child Development',
            self::Vaccinations => 'Vaccinations',
            self::MentalHealth => 'Mental Health',
        };
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
