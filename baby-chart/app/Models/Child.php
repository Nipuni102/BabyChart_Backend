<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'date_of_birth', 'hearing', 'height', 'birth_weight', 'eye_sight', 'blood_group', 'bmi', 'child_birth_registration_number', 'weight', 'mother_id', 'mid_wife_id'
    ];

    public function mother()
    {
        return $this->belongsTo(Mother::class);
    }

    public function midWife()
    {
        return $this->belongsTo(MidWife::class);
    }

    public function vaccines()
    {
        return $this->hasMany(Vaccine::class);
    }
}