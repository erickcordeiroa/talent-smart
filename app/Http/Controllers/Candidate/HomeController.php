<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Models\Candidate\UserJob;
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

    public function storeUserJob(Request $request)
    {
        $store = new UserJob();
        $store->user_id = Auth::user()->id;
        $store->job_id = $request->job;

        if (!$store->save()) {
            return redirect()->route('app.dash')
                ->with('error', 'Ooops... No momento não estamos conseguindo fazer o seu cadastro nesta vaga, tente novamente mais tarde!');
        }

        return redirect()->route('app.dash')
            ->with('success', 'Yeaah! Sua candidatura para a vaga foi realizada com sucesso, veja suas todas as suas candidaturas em "Minhas Vagas"');
    }

    //My Jobs
    public function myJobs()
    {
        $interested = UserJob::with('jobs')->where('user_id', Auth::user()->id)->paginate(10);
        return view('candidate.jobs.list', [
            'interested' => $interested
        ]);
    }

    public function destroyUserJob($id){
        $autenticateId = Auth::user()->id;
        $userJob = UserJob::find($id);



        if ($userJob->user_id != $autenticateId) {
            return redirect()->route('app.jobs')
                ->with('error', 'O registro que desejou excluir não exite, tente novamente mais tarde!');
        }

        $userJob->delete();

        return redirect()->route('app.jobs')
            ->with('success', 'A vaga que você se candidatou já foi desvinculada ao seu perfil!');
    }


    //Teste de Perfil
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
