<?php

namespace App\Http\Controllers;
use App\Models\LaborModel;
use Illuminate\Http\Request;

class LaborController extends Controller
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
        $labor=LaborModel::all();
        return view('labor',compact('labor'));
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
            'type' => 'required|min:2|max:255|unique:labor_models,l_type',
            'rate' => 'required|min:3'
        ]);

        $gettype=request('type');
        $rate=request('rate');

        $labor=new LaborModel();
        $labor->l_type=$gettype;
        $labor->amount=$rate;

        $labor->save();

        
        return redirect('/addlabor')->with('Success','Successfully Added!');
        

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
        $labors=LaborModel::find($id);
        return view('editlab',compact('labors'));
    }
    public function delete($id)
    {
        $labors=LaborModel::find($id);
        $labors->delete();
        echo "<script>alert('Labor Deleted Successfully !!');window.location='/addlabor';</script>";
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
        $labor=LaborModel::find($id);

        $validated = $request->validate([
            'type' => 'required|min:2|max:255',
            'rate' => 'required|min:3'
        ]);

        $gettype=request('type');
        $rate=request('rate');

        $labor->l_type=$gettype;
        $labor->Amount=$rate;

        
        $labor->save();
        echo "<script>alert('Labor Updated Successfully !!');window.location='/addlabor';</script>";
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
