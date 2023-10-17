<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Candidate\Education;
use App\Models\Candidate\Experience;
use App\Models\Candidate\UserJob;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request)
    {

        $profile = $request->input('profile', 'All');

        if (Auth::user()->fantasy == null) {
            return redirect()->route('company.profile');
        }

        $candidates = User::where('account', 'candidate')
            ->whereNotNull('profile')
            ->when($profile && $profile !== "All", function ($query) use ($profile){
                return $query->where('profile', $profile);
            })
            ->paginate(12);

        return view('company.index', [
            'candidates' => $candidates, 
            'profile' => $profile
        ]);
    }

    public function show(User $user)
    {
        return view('company.candidate', [
            "user" => $user,
            "experiences" => Experience::where('user_id', $user->id)->get(),
            "educations" => Education::where('user_id', $user->id)->get()
        ]);
    }

    public function interested()
    {
        $interested = DB::table('user_jobs')
            ->join('jobs', 'user_jobs.job_id', '=', 'jobs.id')
            ->join('users', 'user_jobs.user_id', '=', 'users.id')
            ->join('clients', 'clients.id', '=', 'jobs.client_id')
            ->select('jobs.title', 'clients.fantasy','users.name', 'users.slug', 'users.profile','users.photo', 'user_jobs.*')
            ->orderBy('created_at', 'DESC')->paginate(15);

        return view('company.interested', ['interested' => $interested]);
    }

    public function interestedDestroy($id)
    {
        $interested = UserJob::find($id);

        $notify = new Notification();
        $notify->user_id = $interested->user_id;
        $notify->job_id = $interested->job_id;
        $notify->status = 'off';
        $notify->save();

        $interested->delete();

        return redirect()->route('company.interested')
            ->with('success', 'O perfil do candidado foi removido da lista de interessados');
    }
}
