<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Profile extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'user_id',
        'bio',
    ];
    public function user()
    {
            return $this->belongsTo(User::class);
    }

    public function skills()
    {
        return $this->hasMany(ProfileSkill::class);
    }
}
