<?php

namespace App\Http\Controllers;

use App\Models\Election;
use Illuminate\Http\Request;

class ElectionController extends Controller
{
    public function index()
    {
        $elections = Election::all();
        return view('elections.index', compact('elections'));
    }

    public function create()
    {
        // Fetch upcoming elections from the database or define an empty array if not applicable
        $elections = Election::where('date', '>=', now())->get();
    
        // Pass the elections to the view
        return view('elections.create', compact('elections'));
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'status' => 'required|in:upcoming,completed',
        ]);

        Election::create($validated);

        return redirect()->route('elections.index');
    }
}
