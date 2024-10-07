<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Election;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $election = Election::findOrFail($id);
        $candidate = Candidate::where('election_id', $id)->oldest()->get();

        return view('pages.admin.candidate.index', compact('election', 'candidate'),);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $election = Election::findOrFail($id);
        $user = User::where('role', 'user')->orderBy('name', 'asc')->get();

        return view(
            'pages.admin.candidate.create',
            compact('user', 'election')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Election $election)
    {
        $this->validate($request, [
            'ketua_id' => 'required',
            'wakil_id' => 'required',
            'ketua_image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'wakil_image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'vision' => 'required',
            'mission' => 'required',
        ]);

        try {
            $data = $request->all();

            $data['election_id'] = $election->id;

            $ketua_image = $request->file('ketua_image');
            $ketua_image->storeAs('public/candidate', $ketua_image->hashName());
            $data['ketua_image'] = $ketua_image->hashName();

            $wakil_image = $request->file('wakil_image');
            $wakil_image->storeAs('public/candidate', $wakil_image->hashName());
            $data['wakil_image'] = $wakil_image->hashName();

            $election->candidates()->create($data);

            return redirect()->route('admin.election.candidate.index', $election->id)->with('success', 'Candidate successfully created');
        } catch (Exception $e) {
            return redirect()->back()->with('errors', 'Candidate failed to created');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $election, string $candidate)
    {
        $election = Election::findOrFail($election);
        $candidate = Candidate::findOrFail($candidate);

        return view('pages.admin.candidate.show', compact('candidate', 'election'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $election_id, string $candidate_id)
    {
        $election = Election::findOrFail($election_id);
        $candidate = Candidate::findOrFail($candidate_id);
        $user = User::where('role', 'user')->orderBy('name', 'asc')->get();

        return view('pages.admin.candidate.edit', compact('election', 'candidate', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $election, string $candidate)
    {

        $this->validate($request, [
            'ketua_id' => 'required',
            'wakil_id' => 'required',
            'ketua_image' => 'image|mimes:png,jpg,jpeg|max:2048',
            'wakil_image' => 'image|mimes:png,jpg,jpeg|max:2048',
            'vision' => 'required',
            'mission' => 'required',
        ]);

        try {
            $candidate = Candidate::find($candidate);
            $election = Election::find($election);

            $data = $request->all();

            if (!$request->file('ketua_image') == '') {
                Storage::disk('local')->delete('public/candidate/' . basename($candidate->ketua_image));

                $ketua_image = $request->file('ketua_image');
                $ketua_image->storeAs('public/candidate', $ketua_image->hashName());
                $data['ketua_image'] = $ketua_image->hashName();
            }

            if (!$request->file('wakil_image') == '') {
                Storage::disk('local')->delete('public/candidate/' . basename($candidate->wakil_image));

                $wakil_image = $request->file('wakil_image');
                $wakil_image->storeAs('public/candidate', $wakil_image->hashName());
                $data['wakil_image'] = $wakil_image->hashName();
            }

            $candidate->update($data);

            return redirect()->route('admin.election.candidate.index', $election->id)->with('success', 'Candidate successfully updated');
        } catch (Exception $e) {
            // dd($e);
            return redirect()->back()->with('errors', 'Candidate failed to updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $electionId, string $candidateId)
    {
        try {

            $election = Election::find($electionId);
            $candidate = $election->candidates->find($candidateId);

            Storage::disk('local')->delete('public/candidate/' . basename($candidate->ketua_image));
            Storage::disk('local')->delete('public/candidate/' . basename($candidate->wakil_image));

            $candidate->delete();

            return redirect()->back()->with('success', 'Candidate successfully deleted');
        } catch (Exception $e) {
            // dd($e);
            return redirect()->back()->with('success', 'Candidate failed to deleted');
        }
    }
}
