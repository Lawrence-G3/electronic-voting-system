<?php

namespace App\Http\Controllers;

use App\Models\Ballot;
use App\Models\Election;
use Illuminate\Http\Request;

class BallotController extends Controller
{
    public function create()
    {
        $elections = Election::all();
        return view('ballots.create', compact('elections'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'status' => 'required|in:active,inactive',
            'election_id' => 'required|exists:elections,id',
        ]);

        Ballot::create($validated);

        return redirect()->route('elections.index');
    }
}
