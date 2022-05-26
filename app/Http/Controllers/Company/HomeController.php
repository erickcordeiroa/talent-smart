<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $candidates = User::where('account', 'candidate')
            ->whereNotNull('profile')->get();

        return view('company.index', ['candidates' => $candidates]);
    }
}
