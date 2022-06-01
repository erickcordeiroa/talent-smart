<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Candidate\Education;
use App\Models\Candidate\Experience;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::user()->fantasy == null) {
            return redirect()->route('company.profile');
        }


        $candidates = User::where('account', 'candidate')
            ->whereNotNull('profile')->paginate(12);

        return view('company.index', ['candidates' => $candidates]);
    }

    public function show(User $user)
    {
        return view('company.candidate', [
            "user" => $user,
            "experiences" => Experience::where('user_id', $user->id)->get(),
            "educations" => Education::where('user_id', $user->id)->get()
        ]);
    }
}
