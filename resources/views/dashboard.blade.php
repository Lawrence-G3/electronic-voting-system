<!-- resources/views/dashboard.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Welcome to the eKura Voting System Dashboard</h1>

    <!-- Example of displaying some data -->
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Total Votes Cast
                </div>
                <div class="card-body">
                    <!-- Replace this with dynamic data -->
                    <h3>{{ $totalVotes ?? 0 }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Ongoing Elections
                </div>
                <div class="card-body">
                    <!-- Display ongoing elections here -->
                    @foreach($elections as $election)
                        <p>{{ $election->name }}</p>
                    @endforeach
                </div>
            </div>
        </div>
        
        <!-- Add more sections like Election Results, User Management, etc. -->
    </div>
</div>
@endsection
