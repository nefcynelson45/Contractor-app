<?php

namespace App\Http\Controllers;
use App\Models\ConstructionModel;
use Illuminate\Http\Request;

class ConstructionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cons=ConstructionModel::select('cons_id','cons_type')->get();
        return view('viewcons',compact('cons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $const=ConstructionModel::all();
        return view('construction',compact('const'));
    }
    public function search(Request $request)
    {
        $getsearch=request('search');
        $const=ConstructionModel::query()->where('cons_type','LIKE',"%{$getsearch}%")->get();
        return view('construction',compact('const'));
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
            'cons' => 'required|min:2|max:255'
        ]);

        $cons=request('cons');

        $con=new ConstructionModel();
        $con->cons_type=$cons;

        $con->save();

        return redirect('/addconst')->with('Success','Successfully Registered!');
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
        $cons=ConstructionModel::find($id);
        return view('editcons',compact('cons'));
    }
    
    public function delete($id)
    {
        $cons=ConstructionModel::find($id);
        $cons->delete();
        echo "<script>alert('Construction Deleted Successfully !!');window.location='/addconst';</script>";
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
        $validated = $request->validate([
            'cons' => 'required|min:2|max:255|unique:construction_models,cons_type'
        ]);
        $cons=ConstructionModel::find($id);
        $const=request('cons');
        $cons->cons_type=$const;

        $cons->save();
        echo "<script>alert('Construction Updated Successfully !!');window.location='/addconst';</script>";
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
