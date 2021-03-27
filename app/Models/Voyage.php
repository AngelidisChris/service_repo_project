<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voyage extends Model
{
    use HasFactory;

    protected $fillable = ['vessel_id', 'start', 'end', 'revenues', 'expenses'];

    public function vessel()
    {
        return $this->belongsTo(Vessel::class);
    }
}
