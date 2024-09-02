<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Election;
use App\Models\ElectionCandidate;
use Exception;
use Illuminate\Http\Request;

class ElectionCandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $election_candidate = ElectionCandidate::latest()->get();

        return view('pages.admin.election_candidate.index', compact('election_candidate'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $candidate = Candidate::get();
        $election = Election::get();

        return view('pages.admin.election_candidate.create', compact('candidate', 'election'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'election_id' => 'required',
            'candidate_id' => 'required',
        ]);

        try {
            $data = $request->all();

            ElectionCandidate::create($data);

            return redirect()->route('admin.election_candidate.index')->with('success', 'Election Candidate successfully created');
        } catch (Exception $e) {
            return redirect()->back()->with('errors', 'Election Candidate failed to created');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $election_candidate = ElectionCandidate::findOrFail($id);

        return view('pages.admin.election_candidate.show', compact('election_candidate'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $election_candidate = ElectionCandidate::findOrFail($id);
        $candidate = Candidate::get();
        $election = Election::get();

        return view('pages.admin.election_candidate.edit', compact('candidate', 'election', 'election_candidate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'election_id' => 'required',
            'candidate_id' => 'required',
        ]);

        try {
            $election_candidate = ElectionCandidate::findOrFail($id);

            $data = $request->all();

            $election_candidate->update($data);

            return redirect()->route('admin.election_candidate.index')->with('success', 'Election Candidate failed updated');
        } catch (Exception $e) {
            return redirect()->back()->with('errors', 'Election Candidate failed to updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $election_candidate = ElectionCandidate::find($id);

            $election_candidate->delete();

            return redirect()->back()->with('success', 'Election Candidate successfully deleted');
        } catch (\Throwable $th) {
            return redirect()->back()->with('success', 'Election Candidate failed to deleted');
        }
    }
}
