<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Election;
use App\Models\Vote;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $election = Election::latest()->get();
        $upcomingElection = $election->filter(function ($election) {
            return $election->status === 'upcoming';
        })->take(5);
        $ongoingElection = $election->filter(function ($election) {
            return $election->status === 'ongoing';
        });
        $completedElection = $election->filter(function ($election) {
            return $election->status === 'completed';
        })->take(5);

        return view('pages.frontend.index', compact('election', 'upcomingElection', 'ongoingElection', 'completedElection'));
    }

    public function allElections()
    {
        $election = Election::latest()->get();
        $upcomingElection = $election->filter(function ($election) {
            return $election->status === 'upcoming';
        });
        $ongoingElection = $election->filter(function ($election) {
            return $election->status === 'ongoing';
        });
        $completedElection = $election->filter(function ($election) {
            return $election->status === 'completed';
        });

        return view('pages.frontend.allElections', compact('election', 'upcomingElection', 'ongoingElection', 'completedElection'));
    }

    public function detailElection($slug)
    {
        $election = Election::with('candidates')->where('slug', $slug)->first();

        $election->starting_date = Carbon::parse($election->starting_date)->format('l, d F Y');
        $election->finishing_date = Carbon::parse($election->finishing_date)->format('l, d F Y');

        $candidates = Candidate::where('election_id', $election->id)
                    ->withCount('votes')
                    ->orderBy('votes_count', 'desc')
                    ->get();

        return view('pages.frontend.detailElection', compact('election', 'candidates'));
    }

    public function detailCandidate($slug, $id)
    {
        $candidate = Candidate::findOrFail($id);
        $election = Election::where('slug', $slug)->first();

        $hasVoted = Vote::where('user_id', Auth::user()->id)
            ->where('election_id', $election->id)
            ->exists();

        return view('pages.frontend.detailCandidate', compact('election', 'candidate', 'hasVoted'));
    }
}
