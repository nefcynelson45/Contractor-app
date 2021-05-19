<?php

namespace App\Http\Controllers;
use App\Models\MaterialModel;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $materials=MaterialModel::all();
        return view('material',compact('materials'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'matname' => 'required|min:2|max:255|unique:material_models,mat_name',
            'rate' => 'required|min:3'
        ]);


        $mat=request('matname');
        $rate=request('rate');

        $material=new MaterialModel();
        $material->mat_name=$mat;
        $material->rate=$rate;

        $material->save();

        return redirect('/addmaterial')->with('Success','Successfully Registered!');
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
        $mat=MaterialModel::find($id);
        return view('editmat',compact('mat'));
    }
    public function delete($id)
    {
        $mat=MaterialModel::find($id);
        $mat->delete();
        echo "<script>alert('Material Deleted Successfully !!');window.location='/addmaterial';</script>";
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
        $mat=MaterialModel::find($id);

        $validated = $request->validate([
            'rate' => 'required|min:3'
        ]);

        $matn=request('matname');
        $rate=request('rate');

        $mat->mat_name=$matn;
        $mat->rate=$rate;

        $mat->save();
        
        return redirect('/addmaterial')->with('success','Successfully Added!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
