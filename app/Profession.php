<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
    protected $fillable = ['title', 'description', 'education_level', 'salary', 'sector', 'experience_required'];

    public function profiles()
    {
        return $this->hasMany(UserProfile::class);
    }

    public function skills()
    {
        return $this->belongsToMany(ProfessionSkill::class);
    }
}
