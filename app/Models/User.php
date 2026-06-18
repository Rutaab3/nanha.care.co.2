<?php

namespace App\Models;

use App\Enums\UserStatus;
use App\Models\Babysitting\Booking;
use App\Models\Babysitting\Child;
use App\Models\Babysitting\SavedBabysitter;
use App\Models\Blog\BlogBookmark;
use App\Models\Marketplace\Order;
use App\Models\Profiles\BabysitterProfile;
use App\Models\Profiles\DoctorProfile;
use App\Models\Support\SupportTicket;
use App\Models\System\Notification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, HasRoles, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'city',
        'status',
        'avatar',
    ];

    protected $casts = [
        'status' => UserStatus::class,
        'password' => 'hashed',
    ];

    public function babysitterProfile()
    {
        return $this->hasOne(BabysitterProfile::class, 'user_id');
    }

    public function doctorProfile()
    {
        return $this->hasOne(DoctorProfile::class, 'user_id');
    }

    public function parentBookings()
    {
        return $this->hasMany(Booking::class, 'parent_id');
    }

    public function babysitterBookings()
    {
        return $this->hasMany(Booking::class, 'babysitter_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'parent_id');
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class, 'user_id');
    }

    public function supportTickets()
    {
        return $this->hasMany(SupportTicket::class, 'user_id');
    }

    public function savedBabysitters()
    {
        return $this->hasMany(SavedBabysitter::class, 'parent_id');
    }

    public function blogBookmarks()
    {
        return $this->hasMany(BlogBookmark::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Child::class, 'parent_id');
    }
}
