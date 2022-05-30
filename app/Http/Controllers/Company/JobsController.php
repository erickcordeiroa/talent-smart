<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Company\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('company.jobs.index', [
            'jobs' => Job::with('categories')->where('user_id', Auth::user()->id)->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.jobs.create', [
            'categories' => Category::all()
        ]);
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
            'title', 'category_id', 'city', 'salary', 'match', 'transport',
            'snack', 'food', 'health', 'description', 'tags'
        ]);

        $validator = Validator::make($data, [
            'title' => ['required', 'string', 'min:3', 'max:255'],
            'category_id' => ['required', 'integer'],
            'city' => ['required', 'string'],
            'salary' => ['required', 'between:0,99.99'],
            'description' => ['string', 'max:500'],
            'tags' => ['string', 'max:255']
        ]);

        if ($validator->fails()) {
            return redirect()->route('company.create.jobs')
                ->withErrors($validator)->withInput();
        }

        $job = new Job();
        $job->user_id = Auth::user()->id;
        $job->category_id = $data['category_id'];
        $job->title = $data['title'];
        $job->city = $data['city'];
        $job->salary = $data['salary'];
        $job->match = (!empty($data['match'])) ? 1 : 0;
        $job->transport = (!empty($data['transport'])) ? 1 : 0;
        $job->snack = (!empty($data['snack'])) ? 1 : 0;
        $job->food = (!empty($data['food'])) ? 1 : 0;
        $job->health = (!empty($data['health'])) ? 1 : 0;
        $job->description = $data['description'];
        $job->tags = $data['tags'];
        $job->save();

        return redirect()->route('company.jobs')
            ->with('success', 'Parabéns sua vaga foi cadastrada!');
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
    public function edit(Job $job)
    {
        return view('company.jobs.edit', [
            "job" => $job,
            "categories" => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
        $data = $request->only([
            'title', 'category_id', 'city', 'salary', 'match', 'transport',
            'snack', 'food', 'health', 'description', 'tags'
        ]);

        $validator = Validator::make($data, [
            'title' => ['required', 'string', 'min:3', 'max:255'],
            'category_id' => ['required', 'integer'],
            'city' => ['required', 'string'],
            'salary' => ['required', 'between:0,99.99'],
            'description' => ['string', 'max:500'],
            'tags' => ['string', 'max:255']
        ]);

        if ($validator->fails()) {
            return redirect()->route('company.create.jobs')
                ->withErrors($validator)->withInput();
        }

        $job = Job::find($job->id);
        $job->user_id = Auth::user()->id;
        $job->category_id = $data['category_id'];
        $job->title = $data['title'];
        $job->city = $data['city'];
        $job->salary = $data['salary'];
        $job->match = (!empty($data['match'])) ? 1 : 0;
        $job->transport = (!empty($data['transport'])) ? 1 : 0;
        $job->snack = (!empty($data['snack'])) ? 1 : 0;
        $job->food = (!empty($data['food'])) ? 1 : 0;
        $job->health = (!empty($data['health'])) ? 1 : 0;
        $job->description = $data['description'];
        $job->tags = $data['tags'];
        $job->save();

        return redirect()->route('company.jobs')
            ->with('success', 'Parabéns sua vaga foi cadastrada!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job = Job::find($id);
        if(!$job){
            return redirect()->route('company.jobs')
                ->with('errors', 'A vaga que deseja excluir não existe!');
        }

        $job->delete();
        return redirect()->route('company.jobs')
                ->with('success', 'A vaga foi excluida com sucesso!');
    }
}
