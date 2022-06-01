<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if(Auth::user()->fantasy == null){
            return redirect()->route('company.profile');
        }


        $candidates = User::where('account', 'candidate')
            ->whereNotNull('profile')->paginate(12);

        return view('company.index', ['candidates' => $candidates]);
    }
}
