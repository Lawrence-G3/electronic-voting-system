<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Election;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function create()
    {
        $elections = Election::all();
        return view('candidates.create', compact('elections'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'party' => 'required|string',
            'bio' => 'required|string',
            'status' => 'required|in:active,inactive',
            'election_id' => 'required|exists:elections,id',
        ]);

        Candidate::create($validated);

        return redirect()->route('elections.index');
    }
}
