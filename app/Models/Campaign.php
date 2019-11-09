<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $fillable = [
        'tempate_id', 'group_id', 'now', 'is_send', 'total'
    ];

    public function getTemplate()
    {
        return $this->belongsTo(\App\Models\Template::class, 'template_id', 'id');
    }

    public function getGroup()
    {
        return $this->belongsTo(\App\Models\Group::class, 'group_id');
    }

    public function getGroupmember()
    {
        return $this->hasMany(\App\Models\GroupMember::class, 'group_id', 'group_id');
    }
}