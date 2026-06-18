<?php

namespace App\Models\Babysitting;

use App\Models\Profiles\BabysitterProfile;
use Illuminate\Database\Eloquent\Model;

class VerificationBadge extends Model
{
    protected $fillable = [
        'babysitter_profile_id',
        'badge_code',
        'city',
        'issued_at',
    ];

    protected $casts = [
        'issued_at' => 'datetime',
    ];

    public function babysitterProfile()
    {
        return $this->belongsTo(BabysitterProfile::class, 'babysitter_profile_id');
    }
}
