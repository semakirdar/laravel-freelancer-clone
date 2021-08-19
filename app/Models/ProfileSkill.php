<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileSkill extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_id',
        'skill_id',
    ];

    public function skill()
    {
        return $this->belongsTo(Skill::class);
    }

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }


}
