<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Vote;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoteController extends Controller
{
    public function userVote(Request $request, $candidateId) {
        $candidate = Candidate::findOrFail($candidateId);
        try {
            $data = $request->all;
            $data['user_id'] = Auth::user()->id;
            $data['candidate_id'] = $candidateId;
            $data['election_id'] = $candidate->elections->id;
            Vote::create($data);
            return redirect()->route('frontend.index');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
