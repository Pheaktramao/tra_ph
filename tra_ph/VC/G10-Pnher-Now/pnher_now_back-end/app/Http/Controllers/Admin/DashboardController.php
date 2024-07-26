<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Baggage;
use App\Models\Company;
use App\Models\Feedback;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalCompanies = Company::count();
        $totalBaggages = Post::count();
        $allFeedbacks = Feedback::count();

        return view('dashboard', ['totalUsers' => $totalUsers, 'totalCompanies' => $totalCompanies, 'totalBaggages' => $totalBaggages, 'allFeedbacks' => $allFeedbacks]);
    }


    public function lineChart()
    {
        $users = User::select(DB::raw('COUNT(*) as count'), DB::raw('MONTH(created_at) as month'))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderBy('month')
            ->pluck('count', 'month')
            ->toArray();

        $months = [
            1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr', 5 => 'May',
            6 => 'Jun', 7 => 'Jul', 8 => 'Aug', 9 => 'Sep', 10 => 'Oct',
            11 => 'Nov', 12 => 'Dec'
        ];

        $labels = array_values($months);
        $data = [
            'user' => array_map(function ($month) use ($users) {
                return $users[$month] ?? 0;
            }, array_keys($months)),
        ];
        return view('lineChart', ['labels'=>$labels, 'data'=>$data]);
    }
}
