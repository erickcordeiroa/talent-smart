<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Models\Candidate\VolunteerExperience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class VolunteerExperiencesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $experiences = VolunteerExperience::where('user_id', auth()->user()->id)->paginate(10);
        return view('candidate.volunteer.volunteers', ['experiences' => $experiences]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('candidate.volunteer.create');
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
            'title', 'company', 'city', 'start', 'end', 'currently', 'description'
        ]);

        $validator = Validator::make($data, [
            "title" => ['required', 'min:5', 'max:100', 'string'],
            "company" => ['required', 'min:5', 'max:100', 'string'],
            "city" => ['required', 'min:2', 'max:100', 'string'],
            "start" => ['required', 'date', 'date_format:Y-m-d'],
            "description" => ['required', 'min:5', 'string']
        ]);

        if ($validator->fails()) {
            return redirect()->route('app.create.volunteers')
                ->withErrors($validator)->withInput();
        }


        $experience = new VolunteerExperience();
        $experience->title = $data['title'];
        $experience->user_id = Auth::user()->id;
        $experience->company = $data['company'];
        $experience->city = $data['city'];
        $experience->start = $data['start'];
        $experience->end = $data['end'];

        if (!empty($data['currently'])) {
            $experience->currently = 1;
        } else {
            $experience->currently = 0;
        }

        $experience->description = $data['description'];
        $experience->save();

        return redirect()->route('app.volunteers')
            ->with('success', 'Parabéns! Sua experiência foi criada com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $experience = VolunteerExperience::find($id);
        return view('candidate.volunteer.edit', ['experience' => $experience]);
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
            'title', 'company', 'city', 'start', 'end', 'currently', 'description'
        ]);

        $validator = Validator::make($data, [
            "title" => ['required', 'min:5', 'max:100', 'string'],
            "company" => ['required', 'min:5', 'max:100', 'string'],
            "city" => ['required', 'min:2', 'max:100', 'string'],
            "start" => ['required', 'date', 'date_format:Y-m-d'],
            "description" => ['required', 'min:5', 'string']
        ]);

        if ($validator->fails()) {
            return redirect()->route('app.edit.volunteers', ['id' => $id])
                ->withErrors($validator)->withInput();
        }

        $experience = VolunteerExperience::find($id);
        $experience->title = $data['title'];
        $experience->user_id = Auth::user()->id;
        $experience->company = $data['company'];
        $experience->city = $data['city'];
        $experience->start = $data['start'];
        $experience->end = $data['end'];

        if (!empty($data['currently'])) {
            $experience->currently = 1;
        } else {
            $experience->currently = 0;
        }

        $experience->description = $data['description'];
        $experience->save();

        return redirect()->route('app.volunteers')
            ->with('success', 'Parabéns! Sua experiência foi alterada com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $experience = VolunteerExperience::find($id);
        if (!$experience) {
            return redirect()->route('app.volunteers')
                ->with('errors', 'A Experiência que deseja excluir não existe!');
        }

        $experience->delete();
        return redirect()->route('app.volunteers')
            ->with('success', 'A Experiência foi excluida com sucesso!');
    }
}
