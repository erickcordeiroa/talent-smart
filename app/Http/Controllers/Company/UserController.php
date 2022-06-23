<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function index()
    {
        return view('company.profile.perfil', [
            'user' => Auth::user()
        ]);
    }

    public function update(Request $request)
    {
        $id = intval(Auth::id());
        $user = User::find($id);

        $data = $request->only(['photo', 'name', 'fantasy', 'email',
            'address', 'city', 'state', 'password', 'password_confirmation', 'document',
            'description']);

        $validator = Validator::make($data, [
            'photo' => ['image', 'mimes:jpg,png,jpeg,gif,svg', 'max:2048'],
            'fantasy' => ['required', 'string', 'min:3', 'max:255'],
            'name' => ['required', 'string', 'min:3', 'max:100'],
            'email' => ['required', 'email'],
            'address' => ['string'],
            'city' => ['required', 'string'],
            'state' => ['required', 'string', 'min:2'],
            'document' => ['required', 'string', 'min:11', 'max:16'],
            'description' => ['string', 'max: 255']
        ]);

        //Verify Exists Image
        if ($request->hasFile('photo')) {

            $dest = public_path('/media/avatars');
            $imgName = md5(time().rand(0,9999)).'.jpg';

            $avatar = $request->file('photo');
            $img = Image::make($avatar->getRealPath());
            $img->fit(300,300)->save($dest.'/'.$imgName);

            $user->photo = $imgName;
        }

        $user->name = $data['name'];
        $user->fantasy = $data['fantasy'];

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
        $user->document = $data['document'];
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
            return redirect()->route('company.profile')
                ->withErrors($validator);
        }

        $user->save();

        return redirect()->route("company.profile")
            ->with('success', 'Suas informações foram alteradas com sucesso!');
    }
}
