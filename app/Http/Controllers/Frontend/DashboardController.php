<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Election;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

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
        
        return view('pages.frontend.detailElection', compact('election'));
    }

    public function detailCandidate($slug, $id) {
        $candidate = Candidate::findOrFail($id);
        $election = Election::where('slug', $slug)->first();

        return view('pages.frontend.detailCandidate', compact('election', 'candidate'));
    }
}

