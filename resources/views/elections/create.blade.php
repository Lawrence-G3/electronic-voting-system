<!-- resources/views/elections/create.blade.php -->
@extends('layouts.app')

@section('content')
    <h2 class="text-3xl mb-4">Create Election</h2>
    <form action="{{ route('elections.store') }}" method="POST">
        @csrf
        <div class="space-y-4">
            <div>
                <label for="name" class="block">Election Name</label>
                <input type="text" id="name" name="name" class="w-full p-2 border rounded" required>
            </div>
            <div>
                <label for="description" class="block">Description</label>
                <textarea id="description" name="description" class="w-full p-2 border rounded" required></textarea>
            </div>
            <div>
                <label for="status" class="block">Status</label>
                <select id="status" name="status" class="w-full p-2 border rounded" required>
                    <option value="upcoming">Upcoming</option>
                    <option value="completed">Completed</option>
                </select>
            </div>
            <div>
                <button type="submit" class="bg-blue-600 text-white p-2 rounded">Save Election</button>
            </div>
        </div>
    </form>
@endsection
