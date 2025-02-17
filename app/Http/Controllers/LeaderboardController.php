<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leaderboard;
use App\Models\User;
use Carbon\Carbon;

class LeaderboardController extends Controller
{
    /**
     * Show Board Data with filters
     */
    public function index(Request $request)
    {
        $query = Leaderboard::with('user')->orderBy('rank');

        if ($request->has('filter')) {
            $date = Carbon::now();
            switch ($request->filter) {
                case 'day':
                    $query = $query->whereDate('created_at', $date);
                    break;
                case 'month':
                    $query = $query->whereMonth('created_at', $date->month);
                    break;
                case 'year':
                    $query = $query->whereYear('created_at', $date->year);
                    break;
            }
        }

        if ($request->has('user_id')) {
            $query = $query->where('user_id', $request->user_id);
        }

        return view('leaderboard', ['leaderboard' => $query->get()]);
    }

    /** 
     * Recalculate Board Data
     */
    public function recalculate()
    {
        $leaderboardEntries = User::with('activities')->get()->map(function ($user) {
            return [
                'user_id' => $user->id,
                'total_points' => $user->activities->sum('points')
            ];
        })->sortByDesc('total_points')->values();

        $rank = 1;
        foreach ($leaderboardEntries as $index => $entry) {
            if ($index > 0 && $entry['total_points'] < $leaderboardEntries[$index - 1]['total_points']) {
                $rank = $index + 1;
            }

            Leaderboard::updateOrCreate(['user_id' => $entry['user_id']], [
                'total_points' => $entry['total_points'],
                'rank' => $rank
            ]);
        }

        return redirect()->route('leaderboard');
    }
}
