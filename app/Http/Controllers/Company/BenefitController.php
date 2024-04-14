<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company\Benefit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BenefitController extends Controller
{
    public function index()
    {
        $benefits = Benefit::paginate(12);
        return view('company.benefits.index', compact('benefits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.benefits.create');
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
            'title'
        ]);

        $validator = Validator::make($data, [
            'title' => ['required', 'string', 'min:3', 'max:255'],
        ]);

        if ($validator->fails()) {
            return redirect()->route('company.create.benefits')
                ->withErrors($validator)->withInput();
        }

        Benefit::create($data);

        return redirect()->route('company.benefits')
            ->with('success', 'Parabéns seu benefício foi criado!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Benefit $benefit)
    {
        return view('company.benefits.edit', compact('benefit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Benefit $benefit, Request $request)
    {
        $data = $request->only([
            'title'
        ]);

        $validator = Validator::make($data, [
            'title' => ['required', 'string', 'min:3', 'max:255'],
        ]);

        if ($validator->fails()) {
            return redirect()->route('company.create.benefits')
                ->withErrors($validator)->withInput();
        }

        $newBenefit = Benefit::find($benefit->id);
        $newBenefit->title = $data['title'];
        $newBenefit->save();

        return redirect()->route('company.benefits')
            ->with('success', 'Parabéns seu benefício foi atualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Benefit::find($id);
        if(!$category){
            return redirect()->route('company.benefits')
                ->with('errors', 'O Benefício que deseja excluir não existe!');
        }

        $category->delete();
        return redirect()->route('company.benefits')
                ->with('success', 'O Benefício foi excluida com sucesso!');
    }
}
