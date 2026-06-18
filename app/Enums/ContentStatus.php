<?php

namespace App\Enums;

enum ContentStatus: string
{
    case Draft = 'draft';
    case UnderReview = 'under_review';
    case Published = 'published';
    case Rejected = 'rejected';
    case Archived = 'archived';

    public function label(): string
    {
        return match ($this) {
            self::Draft => 'Draft',
            self::UnderReview => 'Under Review',
            self::Published => 'Published',
            self::Rejected => 'Rejected',
            self::Archived => 'Archived',
        };
    }
}
