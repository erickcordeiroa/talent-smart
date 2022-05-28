<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $jobs = DB::table('jobs')
                ->join('users', 'jobs.user_id', '=', 'users.id')
                ->leftJoin('user_jobs', 'jobs.id', '=', 'user_jobs.job_id')
                ->select('jobs.*', 'users.fantasy', 'users.photo')
                ->where('user_jobs.user_id', '<>', Auth::user()->id)
                ->orWhereNull('user_jobs.id')
                ->get();

        return view('candidate.index', ['jobs' => $jobs]);
    }
}
