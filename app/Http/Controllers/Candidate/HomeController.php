<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Company\Job;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        if(Auth::user()->profile == null){
            return redirect()->route('app.disc');
        }

        $jobs = DB::table('jobs')
                ->join('users', 'jobs.user_id', '=', 'users.id')
                ->join('categories', 'jobs.category_id', '=', 'categories.id')
                ->leftJoin('user_jobs', 'jobs.id', '=', 'user_jobs.job_id')
                ->select('jobs.*', 'users.fantasy', 'users.photo', 'categories.title as categories')
                ->where('user_jobs.user_id', '<>', Auth::user()->id)
                ->orWhereNull('user_jobs.id')
                ->paginate(10);

        return view('candidate.index', [
            'jobs' => $jobs,
            'categories' => Category::all()
        ]);
    }

    public function jobItem(Job $job)
    {
        return view('candidate.jobs.jobitem', ["job" => $job]);
    }

    public function disc()
    {
        return view('candidate.disc');
    }
}
