<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        'name', 'description'
    ];

    public function members()
    {
        return $this->belongsToMany(\App\Models\Member::class);
    }

    // public function group_user()
    // {
    //     return $this->hasMany(\App\Models\GroupUser::class);
    // }

    public function group_member()
    {
        return $this->hasMany(\App\Models\GroupMember::class);
    }
}
