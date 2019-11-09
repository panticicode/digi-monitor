<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'is_admin','full_name', 'date_of_birth', 'gender', 'phone', 'email', 'nationality', 
        'address', 'suburb', 'employment', 'occupation', 'tither', 'weekly_tither',
		'monthly_tither', 'marital_status', 'weeding_date', 'born_again', 'baptized',
		'tongues?' ,'sunday_attendance', 'bible_study', 'tuesday_service', 'friday_prayers',
		'night_vigil', 'pregnant', 'delivery_date'
    ];
}