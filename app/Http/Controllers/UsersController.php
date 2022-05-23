<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function index()
    {
        //Pegando o Id do usuário logado;
        $id = Auth::user()->id;

        //Pegando todas as informações do usuário logado;
        $user = User::find($id);
        return view('candidate.profile.perfil', ["user" => $user]);
    }
}
