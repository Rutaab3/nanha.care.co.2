<?php

namespace App\Models\Babysitting;

use App\Models\Profiles\BabysitterProfile;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class BabysitterReview extends Model
{
    protected $fillable = [
        'booking_id',
        'parent_id',
        'babysitter_id',
        'rating',
        'comment',
        'reply',
        'is_flagged',
    ];

    protected $casts = [
        'is_flagged' => 'boolean',
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class, 'booking_id');
    }

    public function parent()
    {
        return $this->belongsTo(User::class, 'parent_id');
    }

    public function babysitterProfile()
    {
        return $this->belongsTo(BabysitterProfile::class, 'babysitter_id', 'user_id');
    }
}
