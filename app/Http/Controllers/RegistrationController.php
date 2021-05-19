<?php

namespace App\Http\Controllers;
use App\Models\RegistrationModel;
use App\Models\LoginModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers=RegistrationModel::where('cust_id','!=',1)->get();
        return view('viewallcustomers',compact('customers'));
    }

    public function search(Request $request)
    {
        $getsearch=request('search');
        $customers=RegistrationModel::query()->where('cust_name','LIKE',"%{$getsearch}%")
                                                ->where('cust_id','!=',1)->get();
        return view('viewallcustomers',compact('customers'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /*public function store(Request $request)
    {
        $request->validate([
            'cust_name'=>'required|min:2',
            'phone'=>'required|unique:registration_models,phone',
            'cust_email'=>'required|unique:registration_models,email',
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

            $customer=new RegistrationModel();
            $login=new LoginModel();
            $customer->cust_name=$getname;
            $customer->email=$email;
            $customer->phone=$getphone;
            $customer->occupation=$getocc;
            $customer->address=$getaddr;
            $customer->dob=$getdob;
    
            $login->uname=$email;
            $login->password=$getpwd;
    
            $customer->save();
            $login->save();
    
            echo "<script>alert('Registered Successfully !');window.location='auth.login';</script>";
        }
        else{
            echo "<script>alert('Password Mismatch');window.location='auth.register';</script>";
        }


    }*/

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
