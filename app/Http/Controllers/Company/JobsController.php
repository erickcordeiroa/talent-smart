<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Company\Benefit;
use App\Models\Company\Client;
use App\Models\Company\Job;
use App\Models\JobBenefit;
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
            'jobs' => Job::with(['categories', 'clients'])->paginate(10)
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
            'categories' => Category::all(),
            'clients' => Client::all(),
            'benefits' => Benefit::all(),
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
            'title', 'client_id', 'category_id', 'city', 'salary', 'match', 'benefits', 'description', 'tags'
        ]);

        $validator = Validator::make($data, [
            'title' => ['required', 'string', 'min:3', 'max:255'],
            'category_id' => ['required', 'integer'],
            'client_id' => ['required', 'integer'],
            'city' => ['required', 'string'],
            'salary' => ['required', 'between:0,99.99'],
            'description' => ['string', 'max:500'],
        ]);

        if ($validator->fails()) {
            return redirect()->route('company.create.jobs')
                ->withErrors($validator)->withInput();
        }

        $job = new Job();
        $job->category_id = $data['category_id'];
        $job->client_id = $data['client_id'];
        $job->title = $data['title'];
        $job->city = $data['city'];
        $job->salary = $data['salary'];
        $job->match = (!empty($data['match'])) ? 1 : 0;
        $job->description = $data['description'];
        $job->save();

        if ($data['benefits']) {
            foreach ($data['benefits'] as $item) {
                $benefits = new JobBenefit();
                $benefits->job_id = $job->id;
                $benefits->benefit_id = $item;
                $benefits->save();
            }
        }

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
            "categories" => Category::all(),
            'clients' => Client::all(),
            'benefits' => Benefit::all(),
            'job_benefits' => JobBenefit::where('job_id', $job->id)->get(),
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
            'title', 'client_id', 'category_id', 'city', 'salary', 'match', 'transport',
            'snack', 'food', 'health', 'description', 'tags'
        ]);

        $validator = Validator::make($data, [
            'title' => ['required', 'string', 'min:3', 'max:255'],
            'category_id' => ['required', 'integer'],
            'client_id' => ['required', 'integer'],
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
        $job->client_id = $data['client_id'];
        $job->category_id = $data['category_id'];
        $job->title = $data['title'];
        $job->city = $data['city'];
        $job->salary = $data['salary'];
        $job->match = (!empty($data['match'])) ? 1 : 0;
        $job->description = $data['description'];
        $job->save();

        if ($data['benefits']) {
            $hasBenefits = JobBenefit::where('job_id', $job->id)->get();

            if($hasBenefits) {
                foreach ($hasBenefits as $item) {
                    $item->delete();
                }
            }

            foreach ($data['benefits'] as $item) {
                $benefits = new JobBenefit();
                $benefits->job_id = $job->id;
                $benefits->benefit_id = $item;
                $benefits->save();
            }
        }


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
        if (!$job) {
            return redirect()->route('company.jobs')
                ->with('errors', 'A vaga que deseja excluir não existe!');
        }

        $benefits = JobBenefit::where('job_id', $id)->get();
        if($benefits) {
            foreach($benefits as $item) {
                $item->delete();
            }
        }

        $job->delete();
        return redirect()->route('company.jobs')
            ->with('success', 'A vaga foi excluida com sucesso!');
    }
}
