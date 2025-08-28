<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\IncomingLetter;
use App\Models\OutgoingLetter;
use App\Models\LetterCategory;
use App\Models\LetterStatus;
use Inertia\Inertia;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Display the dashboard.
     */
    public function index()
    {
        $stats = [
            'incoming_letters' => IncomingLetter::count(),
            'outgoing_letters' => OutgoingLetter::count(),
            'categories' => LetterCategory::count(),
            'statuses' => LetterStatus::count(),
            'recent_incoming' => IncomingLetter::with(['category', 'status'])
                ->latest('received_date')
                ->take(5)
                ->get(),
            'recent_outgoing' => OutgoingLetter::with(['category', 'status'])
                ->latest('sent_date')
                ->take(5)
                ->get(),
            'monthly_incoming' => collect(range(5, 0))->map(function ($i) {
                $date = Carbon::now()->subMonths($i);
                $count = IncomingLetter::whereYear('received_date', $date->year)
                    ->whereMonth('received_date', $date->month)
                    ->count();
                return [
                    'month' => $date->format('M Y'),
                    'count' => $count
                ];
            })->values()->all(),
            'monthly_outgoing' => collect(range(5, 0))->map(function ($i) {
                $date = Carbon::now()->subMonths($i);
                $count = OutgoingLetter::whereYear('sent_date', $date->year)
                    ->whereMonth('sent_date', $date->month)
                    ->count();
                return [
                    'month' => $date->format('M Y'),
                    'count' => $count
                ];
            })->values()->all(),
        ];

        return Inertia::render('dashboard', [
            'stats' => $stats
        ]);
    }




}