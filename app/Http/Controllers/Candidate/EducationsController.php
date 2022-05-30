<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Candidate\Education;
use App\Models\Candidate\Experience;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EducationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $educations = Education::where('user_id', auth()->user()->id)->paginate(10);
        return view('candidate.educations.educations', ['educations' => $educations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('candidate.educations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only([
            'title', 'company', 'degree', 'start', 'end', 'description'
        ]);

        $validator = Validator::make($data, [
            "title" => ['required', 'min:5', 'max:100', 'string'],
            "company" => ['required', 'min:5', 'max:100', 'string'],
            "degree" => ['required', 'min:2', 'max:100', 'string'],
            "start" => ['required', 'date', 'date_format:Y-m-d'],
            "description" => ['required', 'min:5', 'string']
        ]);

        if($validator->fails()){
            return redirect()->route('app.create.educations')
                ->withErrors($validator)->withInput();
        }


        $education = new Education();
        $education->title = $data['title'];
        $education->user_id = Auth::user()->id;
        $education->company = $data['company'];
        $education->degree = $data['degree'];
        $education->start = $data['start'];
        $education->end = $data['end'];
        $education->description = $data['description'];
        $education->save();

        return redirect()->route('app.educations')
            ->with('success', 'Parabéns! Seu curso foi criada com sucesso.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $education = Education::find($id);
        return view('candidate.educations.edit', ['education' => $education]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->only([
            'title', 'company', 'degree', 'start', 'end', 'description'
        ]);

        $validator = Validator::make($data, [
            "title" => ['required', 'min:5', 'max:100', 'string'],
            "company" => ['required', 'min:5', 'max:100', 'string'],
            "degree" => ['required', 'min:2', 'max:100', 'string'],
            "start" => ['required', 'date', 'date_format:Y-m-d'],
            "description" => ['required', 'min:5', 'string']
        ]);

        if($validator->fails()){
            return redirect()->route('app.edit.educations', ['id' => $id])
                ->withErrors($validator)->withInput();
        }


        $education = Education::find($id);
        $education->title = $data['title'];
        $education->user_id = Auth::user()->id;
        $education->company = $data['company'];
        $education->degree = $data['degree'];
        $education->start = $data['start'];
        $education->end = $data['end'];
        $education->description = $data['description'];
        $education->save();

        return redirect()->route('app.educations')
            ->with('success', 'Parabéns! Seu curso foi alterado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $education = Education::find($id);
        if(!$education){
            return redirect()->route('app.educations')
                ->with('errors', 'O curso que deseja excluir não existe!');
        }

        $education->delete();
        return redirect()->route('app.educations')
                ->with('success', 'O curso foi excluida com sucesso!');
    }
}
