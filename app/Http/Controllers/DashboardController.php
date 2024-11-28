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

public function dashboard()
{
    // Fetch upcoming elections (date is greater than or equal to the current date)
    $elections = Election::where('date', '>=', now())->get();

    // Pass the $elections variable to the 'dashboard.index' view
    return view('dashboard.index', compact('elections'));
}


}

