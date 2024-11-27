<?php

namespace App\Http\Controllers;

use App\Models\Vote;  
use App\Models\Election; 
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
{
    $totalVotes = Vote::count(); // Get the total number of votes (replace Vote with your model)
    $elections = Election::where('status', 'ongoing')->get(); // Example query for ongoing elections

    return view('dashboard', compact('totalVotes', 'elections'));
}

}

