<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'vaccinated_date', 'batch_no', 'adverse_effects', 'age_to_be_vaccinated', 'child_id'
    ];

    public function child()
    {
        return $this->belongsTo(Child::class);
    }
}
