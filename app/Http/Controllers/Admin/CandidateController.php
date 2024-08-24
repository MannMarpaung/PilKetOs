<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $candidate = Candidate::latest()->get();

        return view('pages.admin.candidate.index', compact('candidate'),);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::where('role', 'user')->get();

        return view(
            'pages.admin.candidate.create',
            compact('user',)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'ketua_id' => 'required',
            'wakil_id' => 'required',
            'ketua_image' => 'required|image|mimes:png,jpg,jpeg|max:5000000',
            'wakil_image' => 'required|image|mimes:png,jpg,jpeg|max:5000000',
            'vision' => 'required',
            'mission' => 'required',
        ]);

        try {
            $data = $request->all();

            $ketua_image = $request->file('ketua_image');
            $ketua_image->storeAs('public/candidate', $ketua_image->hashName());

            $wakil_image = $request->file('wakil_image');
            $wakil_image->storeAs('public/candidate', $wakil_image->hashName());

            $data['ketua_image'] = $ketua_image->hashName();
            $data['wakil_image'] = $wakil_image->hashName();

            Candidate::create($data);

            return redirect()->route('admin.candidate.index');
        } catch (Exception $e) {
            return redirect()->back();
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
