<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\LoginModel;
use App\Models\RegistrationModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;

use Session;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // return view('index');
    }
    

    public function create()
    {
            return view('auth.login');
    }
    public function create1()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    function login(Request $request)
    {
        $request->validate([
            'username'=>'required|email',
            'password'=>'required|min:5|max:12',
        ]);
        //$getemail=request('username');
        //$getpwd=request('password');
        $us=$request->input('user');
        $user=intval($us);

        //$s="select * from Login_models where uname='$getemail' and password='$getpwd' ";

        if($user==1){


               $userInfo=LoginModel::where('uname','=',$request->username)->first();
               if(!$userInfo){
                echo "<script>alert('Invalid Email !! Try Again!!!');window.location='/auth/login';</script>";
               }  
               else{
                   if(Hash::check($request->password,$userInfo->password)){
                        if($userInfo->u_type=="admin"){
                            $request->session()->put('LoggedUser',$userInfo->login_id);
                            return redirect('/admin');
                        }
                        else{
                            echo "<script>alert('Invalid Contractor !! Try Again!!!');window.location='/auth/login';</script>";
                        }
                    }
                   else{
                    echo "<script>alert('Invalid Password !! Try Again!!!');window.location='/auth/login';</script>";
                   }
               }                      
        }
        else if($user==2)
        {
                 $userInfo=LoginModel::where('uname','=',$request->username)->first();
                    if(!$userInfo){
                        echo "<script>alert('Invalid Email !! Try Again!!!');window.location='/auth/login';</script>";
                    }  
                    else{
                     if(Hash::check($request->password,$userInfo->password)){
                         if($userInfo->u_type=="customer"){
                            $request->session()->put('LoggedUser',$userInfo->login_id);
                            return redirect('/cust');
                         }
                         else{
                            echo "<script>alert('Invalid Customer !! Try Again!!!');window.location='/auth/login';</script>";
                         }
                     }
                     else{
                      echo "<script>alert('Invalid Password !! Try Again!!!');window.location='/auth/login';</script>";
                     }
                 }         
        }
        else{  
        echo "<script>alert('Select a Usertype !!');window.location='/auth/login';</script>";
        }
}
public function reg(Request $request)
    {
        $request->validate([
            'cust_name'=>'required|min:2|regex:/^[a-z A-Z]+$/',
            'phone'=>'required|unique:registration_models,phone|min:10',
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
            $login->password=Hash::make($getpwd);
    
            $customer->save();
            $login->save();
    
            echo "<script>alert('Registered Successfully !');window.location='/auth/login';</script>";
        }
        else{
            echo "<script>alert('Password Mismatch');window.location='/auth/reg';</script>";
        }


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

    function logout( ) {

        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            echo "<script>alert('Logged Out Successfully !');window.location='/auth/login';</script>";
        }
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
