<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voyage extends Model
{
    use HasFactory;

    protected $fillable = ['vessel_id', 'start', 'end', 'revenues', 'expenses'];

    protected $casts = [
        'start' => 'datetime:Y-m-d',
        'end' => 'datetime:Y-m-d'
    ];

    public function vessel()
    {
        return $this->belongsTo(Vessel::class);
    }
}
