<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'starting_date',
        'finishing_date',
    ];

    public function candidates()
    {
        return $this->hasMany(Candidate::class);
    }

    public function getStatusAttribute()
    {
        $currentDate = Carbon::now('Asia/Jakarta');

        if ($currentDate->lt($this->starting_date)) {
            return 'upcoming';
        } elseif ($currentDate->gte($this->starting_date) && $currentDate->lt($this->finishing_date)) {
            return 'ongoing';
        } elseif ($currentDate->gte($this->finishing_date)) {
            return 'completed';
        }
    }
}
