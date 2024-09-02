<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'ketua_id',
        'wakil_id',
        'ketua_image',
        'wakil_image',
        'vision',
        'mission',
    ];

    public function ketua()
    {
        return $this->belongsTo(User::class, 'ketua_id');
    }

    public function wakil()
    {
        return $this->belongsTo(User::class, 'wakil_id');
    }

    public function election_candidates()
    {
        return $this->hasMany(ElectionCandidate::class);
    }

}
