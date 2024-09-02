<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElectionCandidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'election_id',
        'candidate_id',
    ];

    public function candidates()
    {
        return $this->belongsTo(Candidate::class, 'candidate_id');
    }

    public function elections()
    {
        return $this->belongsTo(Election::class, 'election_id');
    }
}
