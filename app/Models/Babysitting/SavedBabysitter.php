<?php

namespace App\Models\Babysitting;

use App\Models\Profiles\BabysitterProfile;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class SavedBabysitter extends Model
{
    protected $fillable = [
        'parent_id',
        'babysitter_id',
    ];

    public function parent()
    {
        return $this->belongsTo(User::class, 'parent_id');
    }

    public function babysitterProfile()
    {
        return $this->belongsTo(BabysitterProfile::class, 'babysitter_id');
    }
}
