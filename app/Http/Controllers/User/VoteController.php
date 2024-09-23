<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoteController extends Controller
{
    public function userVote(Request $request, $candidateId) {
        $this->validate($request, [
            'user_id' => 'required',
        ]);

        try {
            $data = $request->all;
            $data['user_id'] = Auth::user()->id;
            $data['candidate_id'] = $candidateId;
            $data['election_id'] = $candidateId->elections->id;
            dd($data);
        } catch (Exception $e) {
            dd($e);
        }
    }
}
