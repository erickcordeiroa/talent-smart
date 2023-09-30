<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class ClientsController extends Controller
{
    public function index()
    {
        $clients = Client::paginate(12);
        return view('company.clients.index', compact('clients'));
    }

    public function create()
    {
        return view('company.clients.create');
    }

    public function store (Request $request)
    {
        $data = $request->only(['company', 'fantasy', 'email', 'document', 'cover']);

        $validator = Validator::make($data, [
            'company' => ['required', 'string', 'min:3', 'max:255'],
            'fantasy' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'email'],
            'document' => ['required', 'string', 'min:11', 'max:14'],
            'cover' => ['image', 'mimes:jpg,png,jpeg,gif,svg', 'max:2048'],
        ]);

        if ($validator->fails()) {
            return redirect()->route('company.create.clients')
                ->withErrors($validator)->withInput();
        }

        $client = new Client();
        $client->company = $data['company'];
        $client->fantasy = $data['fantasy'];
        $client->email = $data['email'];
        $client->document = $data['document'];

        //Verify Exists Image
        if ($request->hasFile('cover')) {

            $dest = public_path('/media/avatars');
            $imgName = md5(time().rand(0,9999)).'.jpg';

            $avatar = $request->file('cover');
            $img = Image::make($avatar->getRealPath());
            $img->fit(300,300)->save($dest.'/'.$imgName);

            $client->cover = $imgName;
        }


        $client->save();

        return redirect()->route('company.clients')
            ->with('success', 'Parabéns seu cliente foi cadastrado!');
    }

    public function edit(Client $client)
    {
        return view('company.clients.edit', compact('client'));
    }

    public function update (Client $client, Request $request)
    {
        $data = $request->only(['company', 'fantasy', 'email', 'document', 'cover']);

        $validator = Validator::make($data, [
            'company' => ['required', 'string', 'min:3', 'max:255'],
            'fantasy' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'email'],
            'document' => ['required', 'string', 'min:11', 'max:14'],
            'cover' => ['image', 'mimes:jpg,png,jpeg,gif,svg', 'max:2048'],
        ]);

        if ($validator->fails()) {
            return redirect()->route('company.create.clients')
                ->withErrors($validator)->withInput();
        }

        $client = Client::find($client->id);
        $client->company = $data['company'];
        $client->fantasy = $data['fantasy'];
        $client->email = $data['email'];
        $client->document = $data['document'];

        //Verify Exists Image
        if ($request->hasFile('cover')) {

            $dest = public_path('/media/avatars');
            $imgName = md5(time().rand(0,9999)).'.jpg';

            $avatar = $request->file('cover');
            $img = Image::make($avatar->getRealPath());
            $img->fit(300,300)->save($dest.'/'.$imgName);

            $client->cover = $imgName;
        }


        $client->save();

        return redirect()->route('company.clients')
            ->with('success', 'Parabéns seu cliente foi atualizado!');
    }

    public function destroy(int $id)
    {
        $client = Client::find($id);
        if(!$client){
            return redirect()->route('company.clients')
                ->with('errors', 'O cliente que deseja excluir não existe!');
        }

        $client->delete();
        return redirect()->route('company.clients')
                ->with('success', 'O cliente foi excluida com sucesso!');
    
    }
}
