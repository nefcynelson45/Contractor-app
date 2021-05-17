<?php

namespace App\Http\Controllers;
use App\Models\LoginModel;
use App\Models\RegistrationModel;
use App\Models\MaterialModel;
use App\Models\LaborModel;
use Illuminate\Http\Request;

class CustomerController extends Controller
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
    function create1(Request $request)
    {
        //$id = $request->session()->get('l_id');
        //return view('admin',compact('id'));
        $mat=MaterialModel::all();
        $data=['LoggedUserInfo'=>LoginModel::where('login_id','=',session('LoggedUser'))->first()];
        return view('admin',compact('data','mat'));
    }

    function create(Request $request)
    {
        //$id = $request->session()->get('l_id');
        //return view('cust',compact('id'));
        $mat=MaterialModel::all();
        $labor=LaborModel::all();
        $data=['LoggedUserInfo'=>RegistrationModel::where('cust_id','=',session('LoggedUser'))->first()];
        return view('cust',$data,compact('mat','labor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function print()
    {
        $customers=RegistrationModel::where('cust_id','!=',1)->get();
                return view('customerreport',compact('customers'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
