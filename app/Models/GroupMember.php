<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupMember extends Model
{
    protected $table = 'group_member';
        
    protected $fillable = [
        'member_id', 'group_id'
    ];

    public function getMember()
    {
        return $this->belongsTo(\App\Models\Member::class, 'member_id');
    }
}
