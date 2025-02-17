<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaderboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white">
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold text-center mb-6">Leaderboard</h1>

        <div class="flex justify-center space-x-4 mb-6">
            <a href="{{ route('leaderboard', ['filter' => 'day']) }}" class="bg-gray-700 px-4 py-2 rounded">Day</a>
            <a href="{{ route('leaderboard', ['filter' => 'month']) }}" class="bg-gray-700 px-4 py-2 rounded">Month</a>
            <a href="{{ route('leaderboard', ['filter' => 'year']) }}" class="bg-gray-700 px-4 py-2 rounded">Year</a>
        </div>

        <div class="flex justify-center mb-6">
            <form method="GET" action="{{ route('leaderboard') }}">
                <input type="text" name="user_id" placeholder="Enter User ID" class="text-black px-4 py-2 rounded">
                <button type="submit" class="bg-blue-500 px-4 py-2 rounded">Search</button>
            </form>
        </div>

        <div class="flex justify-center mb-6">
            <form method="POST" action="{{ route('recalculate') }}">
                @csrf
                <button type="submit" class="bg-red-500 px-6 py-2 rounded">Recalculate</button>
            </form>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border border-gray-600">
                <thead class="bg-gray-800">
                    <tr>
                        <th class="p-3 border border-gray-600">ID</th>
                        <th class="p-3 border border-gray-600">Name</th>
                        <th class="p-3 border border-gray-600">Total Points</th>
                        <th class="p-3 border border-gray-600">Rank</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($leaderboard as $entry)
                        <tr class="bg-gray-700 border border-gray-600">
                            <td class="p-3">{{ $entry->user->id }}</td>
                            <td class="p-3">{{ $entry->user->name }}</td>
                            <td class="p-3">{{ $entry->total_points }}</td>
                            <td class="p-3">#{{ $entry->rank }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
