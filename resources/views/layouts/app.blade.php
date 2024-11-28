<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Kura Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.3/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.0" defer></script>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Drawer -->
        <div class="bg-blue-800 w-64 text-white flex-none">
            <div class="flex items-center justify-center py-4">
                <h1 class="text-2xl font-bold">E-Kura</h1>
            </div>
            <ul class="space-y-4 px-4">
                <li><a href="{{ route('elections.index') }}" class="hover:text-blue-300">Election Management</a></li>
                <li><a href="#" class="hover:text-blue-300">Election Monitoring</a></li>
                <li><a href="#" class="hover:text-blue-300">Voter Management</a></li>
                <li><a href="#" class="hover:text-blue-300">Support & Maintenance</a></li>
                <li><a href="#" class="hover:text-blue-300">Account</a></li>
                <li><a href="{{ route('logout') }}" class="hover:text-blue-300">Logout</a></li>
            </ul>
        </div>

        <!-- Main Content Area -->
        <div class="flex-1 p-6">
            <h2 class="text-3xl font-bold mb-4">Dashboard</h2>

            <!-- Upcoming Elections Section -->
            @php
                // Ensure $elections is set, or default to an empty collection
                $elections = $elections ?? collect();
            @endphp

            <div class="mb-6">
                <h3 class="text-2xl font-semibold">Upcoming Elections</h3>
                <!-- Display upcoming elections here -->
                <div class="space-y-2 mt-4">
                    @foreach ($elections as $election)
                        <div class="p-4 border rounded shadow-sm">
                            <h4 class="font-bold">{{ $election->name }}</h4>
                            <p>{{ $election->description }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Election Management -->
            <div class="mb-6">
                <h3 class="text-2xl font-semibold">Election Management</h3>
                <a href="{{ route('elections.create') }}" class="text-blue-600">Add New Election</a>
            </div>

            <!-- Candidates Management -->
            <div class="mb-6">
                <h3 class="text-2xl font-semibold">Candidates</h3>
                <a href="{{ route('candidates.create') }}" class="text-blue-600">Add Candidate</a>
            </div>

            <!-- Ballots Management -->
            <div class="mb-6">
                <h3 class="text-2xl font-semibold">Ballots</h3>
                <a href="{{ route('ballots.create') }}" class="text-blue-600">Add Ballot</a>
            </div>

        </div>
    </div>
</body>
</html>
