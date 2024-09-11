<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Election;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class ElectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $election = Election::latest()->get();

        return view('pages.admin.election.index', compact('election'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.election.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'starting_date' => 'required',
            'finishing_date' => 'required',
        ]);

        try {
            $data = $request->all();

            Election::create($data);

            return redirect()->route('admin.election.index')->with('success', 'Election successfully created');
        } catch (Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->with('errors', 'Election failed to created');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $election = Election::findOrFail($id);

        return view('pages.admin.election.edit', compact('election'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'starting_date' => 'required',
            'finishing_date' => 'required',
        ]);

        try {
            $election = Election::find($id);

            $data = $request->all();

            $election->update($data);

            return redirect()->route('admin.election.index')->with('success', 'Election successfully updated');
        } catch (Exception $e) {
            return redirect()->back()->with('errors', 'Election failed to updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $election = Election::find($id);

            $election->delete();
            
            return redirect()->back()->with('success', 'Election successfully deleted');
        } catch (Exception $e) {
            return redirect()->back()->with('errors', 'Election failed to dalated');
        }
    }
}
