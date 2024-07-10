<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MidWife extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'password','employee_id', 'phone_number', 'area', 'area_no', 'rdhs_division', 'moh_area'
    ];

    public function children()
    {
        return $this->hasMany(Child::class);
    }
}
