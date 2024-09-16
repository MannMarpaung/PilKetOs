<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Election;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() 
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

    public function election(string $id)
    {
        

        return view('pages.frontend.election', compact('election'));
    }
}
