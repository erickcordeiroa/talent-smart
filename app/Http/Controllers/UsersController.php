<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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

    public function update(Request $request)
    {
        $id = intval(Auth::id());
        $user = User::find($id);

        $data = $request->only(['photo', 'name', 'email',
            'address', 'city', 'state', 'password', 'password_confirmation', 'birthday', 'document',
            'status', 'description']);

        $validator = Validator::make($data, [
            'photo' => ['image', 'mimes:jpg,png,jpeg,gif,svg', 'max:2048'],
            'name' => ['required', 'string', 'min:3', 'max:100'],
            'email' => ['required', 'email'],
            'address' => ['string'],
            'city' => ['required', 'string'],
            'state' => ['required', 'string', 'min:2'],
            'birthday' => ['required', 'date', 'date_format:Y-m-d'],
            'document' => ['required', 'string', 'min:11', 'max:16'],
            'status' => ['required', 'integer'],
            'description' => ['string', 'max: 255']
        ]);

        //Verify Exists Image
        if ($request->hasFile('photo')) {

            if (Storage::exists($user->photo)) {
                Storage::delete($user->photo);
            }

            $photo = $request->photo->store('users');
            $user->photo = $photo;
        }

        $user->name = $data['name'];

        //Verify changed email
        if ($user->email != $data['email']) {
            $hasEmail = User::where('email', $data['email'])->get();

            if (count($hasEmail) !== 0) {
                $validator->errors()->add('email', __('validation.unique', [
                    "attribute" => 'email'
                ]));
            } else {
                $user->email = $data["email"];
            }
        }

        $user->address = $data['address'];
        $user->city = $data['city'];
        $user->state = $data['state'];
        $user->birthday = $data['birthday'];
        $user->document = $data['document'];
        $user->status = $data['status'];
        $user->description = $data['description'];

        if(!empty($data['password'])){
            if (strlen($data['password']) < 8) {
                $validator->errors()->add('password', __('validation.min.string', [
                    "attribute" => 'password',
                    "min" => 8
                ]));
            } elseif ($data['password'] !== $data['password_confirmation']) {
                $validator->errors()->add('password', "O campo SENHA e CONFIRMAR SENHA estão diferentes, verifique por favor!");
            } else {
                $user->password = Hash::make($data["password"]);
            }
        }

        if (count($validator->errors()) > 0) {
            return redirect()->route('app.perfil')
                ->withErrors($validator);
        }

        $user->save();

        return redirect()->route("app.perfil")
            ->with('success', 'Suas informações foram alteradas com sucesso!');
    }
}
