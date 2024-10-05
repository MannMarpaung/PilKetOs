<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Election;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function index($id) {
        $election = Election::findOrFail($id);
        $candidates = Candidate::where('election_id', $election->id)
                    ->withCount('votes')
                    ->orderBy('votes_count', 'desc')
                    ->get();

        return view('pages.admin.election.result', compact('election', 'candidates'));
    }
}
