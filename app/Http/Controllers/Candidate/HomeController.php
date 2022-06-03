<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Company\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::user()->profile == null) {
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

    public function define(Request $request)
    {
        //Seárando as respostas
        foreach ($request->question as $questions => $items) {
            $qa[] = $items["a"];
            $qb[] = $items["b"];
            $qc[] = $items["c"];
            $qd[] = $items["d"];
        }

        //Somando todos as Questões
        $questionA = array_sum($qa);
        $questionB = array_sum($qb);
        $questionC = array_sum($qc);
        $questionD = array_sum($qd);

        $user = User::find(Auth::user()->id);

        if ($questionA > $questionB && $questionA > $questionC && $questionA > $questionD) {
            $user->profile = "Dominante";
        }

        if ($questionB > $questionA && $questionB > $questionC && $questionB > $questionD) {
            $user->profile = "Influente";
        }

        if ($questionC > $questionB && $questionC > $questionA && $questionC > $questionD) {
            $user->profile = "Estável";
        }

        if ($questionD > $questionB && $questionD > $questionC && $questionD > $questionA) {
            $user->profile = "Condescendente";
        }

        $user->save();

        return redirect()->route('app.dash');
    }
}
