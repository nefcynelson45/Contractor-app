<?php

namespace App\Http\Controllers;
use App\Models\LoginModel;
use App\Models\RegistrationModel;
use App\Models\MaterialModel;
use App\Models\BookingModel;
use App\Models\LaborModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;

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

    function profile(Request $request,$id)
    {
        $cust=RegistrationModel::find($id);
        $data=['LoggedUserInfo'=>RegistrationModel::where('cust_id','=',session('LoggedUser'))->first()];
        return view('profile',$data,compact('cust'));

    }

    public function profileupdate(Request $request, $id)
    {
        $cust=RegistrationModel::find($id);
        $login=LoginModel::find($id);
        $request->validate([
            'cust_name'=>'required|min:2|regex:/^[a-z A-Z]+$/',
            'phone'=>'required|min:10',
            'password'=>'required|min:5|max:12',
            'address'=>'required|min:7'
        ]);
        $getname=request('cust_name');
        $email=request('cust_email');
        $getphone=request('phone');
        $getocc=request('occupation');
        $getaddr=request('address');
        $getdob=request('dob');
        $getpwd=request('password');
        $getcpwd=request('cpwd');

        if($getpwd==$getcpwd){
            $cust->cust_name=$getname;
            $cust->email=$email;
            $cust->phone=$getphone;
            $cust->occupation=$getocc;
            $cust->address=$getaddr;
            $cust->dob=$getdob;

            $login->uname=$email;
            $login->password=Hash::make($getpwd);
    
            $cust->save();
            $login->save();

            echo "<script>alert('Profile Updated Successfully !!');</script>";
            $mat=MaterialModel::all();
            $labor=LaborModel::all();
            $data=['LoggedUserInfo'=>RegistrationModel::where('cust_id','=',session('LoggedUser'))->first()];
            return view('cust',$data,compact('mat','labor'));
        }

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
