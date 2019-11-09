<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use Notifiable;
    use Billable;

    const ROLE_SUPPER_ADMIN = 'SupperAdmin';
    const ROLE_ADMIN = 'Admin';
    const ROLE_MEMBER = 'Member'; 
    const ROLE_SUPPLY = 'Supply'; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'email_verified_at', 'password', 'parent_id', 'role', 'unique_id',
        'phone', 'birth_date'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function members()
    {
        return $this->hasMany(User::class, 'parent_id', 'id');
    }

    public function getMembers()
    {
        return $this->hasMany(\App\Models\Member::class, 'is_admin', 'id');
    }

    public function templates()
    {
        return $this->hasMany(\App\Models\Template::class, 'user_id', 'id');
    }

    public function getCampaigns()
    {
        return $this->hasMany(\App\Models\Campaign::class);
    }

    public function groups()
    {
        return $this->hasMany(\App\Models\Group::class);
    }

    public function getGroup()
    {
        return $this->hasMany(\App\Models\Group::class);
    }

    public function isSupperAdmin()
    {
        return $this->role === 'SupperAdmin';
    }

    public function isAdmin()
    {
        return $this->role === 'Admin';
    }
}