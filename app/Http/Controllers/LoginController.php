<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\LoginModel;
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('login');
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
            'uname'=>'required|email',
            'password'=>'required|min:5|max:12',
        ]);
        $getemail=request('uname');
        $getpwd=request('password');
        $us=$request->input('user');
        $user=intval($us);

        //$s="select * from Login_models where uname='$getemail' and password='$getpwd' ";

        if($user==1){


               $userInfo=LoginModel::where('uname','=',$request->uname)->first();
               if(!$userInfo){
                echo "<script>alert('Invalid Email !! Try Again!!!');window.location='/login';</script>";
               }  
               else{
                   if($request->password==$userInfo->password){
                        if($userInfo->u_type=="admin"){
                            $request->session()->put('LoggedUser',$userInfo->login_id);
                            return redirect('/admin');
                        }
                        else{
                            echo "<script>alert('Invalid Contractor !! Try Again!!!');window.location='/login';</script>";
                        }
                    }
                   else{
                    echo "<script>alert('Invalid Password !! Try Again!!!');window.location='/login';</script>";
                   }
               }                      
        }
        else if($user==2)
        {
                 $userInfo=LoginModel::where('uname','=',$request->uname)->first();
                    if(!$userInfo){
                        echo "<script>alert('Invalid Email !! Try Again!!!');window.location='/login';</script>";
                    }  
                    else{
                     if($request->password==$userInfo->password){
                         if($userInfo->u_type=="customer"){
                            $request->session()->put('LoggedUser',$userInfo->login_id);
                            return redirect('/cust');
                         }
                         else{
                            echo "<script>alert('Invalid Customer !! Try Again!!!');window.location='/login';</script>";
                         }
                     }
                     else{
                      echo "<script>alert('Invalid Password !! Try Again!!!');window.location='/login';</script>";
                     }
                 }         
        }
        else{  
        echo "<script>alert('Select a Usertype !!');window.location='/login';</script>";
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

    public function logout(Request $request ) {
        
        header("cache-Control: no-store, no-cache, must-revalidate");
        header("cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            Session::flush();
            $request->session()->regenerate();
            return Redirect('/login');
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
