<?php

namespace App\Http\Controllers;
use App\Models\BookingModel;
use App\Models\FeedbackModel;
use App\Models\RegistrationModel;
use App\Models\ConstructionModel;
use Illuminate\Http\Request;
use Carbon\Carbon;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexcust()
    {
        
        $data=['LoggedUserInfo'=>RegistrationModel::where('cust_id','=',session('LoggedUser'))->first()];
        $feedback=FeedbackModel::where('cust_id','=',session('LoggedUser'))->with('customer')->get();
        return view('viewfb',$data,compact('feedback'));
    }

    public function index()
    {
        $feedback=FeedbackModel::all();
        return view('viewallfeedback',compact('feedback'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $data=['LoggedUserInfo'=>RegistrationModel::where('cust_id','=',session('LoggedUser'))->first()];
        $booking=['bookk'=>BookingModel::where('id',$id)->first()];
        
            foreach($booking as $b)
            {$boid=$b->id;}
            $bid=intval($boid);

            return view('feedback',$data,compact('booking','bid'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $getfb=request('feedback');
        $date=Carbon::now();
        $feedback=new FeedbackModel();
        $data=['LoggedUserInfo'=>RegistrationModel::where('cust_id','=',session('LoggedUser'))->first()];
        foreach($data as $lo)
        {$getcust=$lo->cust_id;}

  
        $feedback->cust_id=$getcust;
        $feedback->id=$id;
        $feedback->feedback=$getfb;
        $feedback->date=$date;
        $feedback->save();

        $data=['LoggedUserInfo'=>RegistrationModel::where('cust_id','=',session('LoggedUser'))->first()];
        $feedback=FeedbackModel::where('cust_id','=',session('LoggedUser'))->with('customer')->get();
        return view('viewfb',$data,compact('feedback'));

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
        $fb=FeedbackModel::find($id);
        return view('editfb',compact('fb'));
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
        $feedback=FeedbackModel::find($id);

        $getfb=request('feedback');
        $date=Carbon::now();

        $feedback->feedback=$getfb;
        $feedback->date=$date;

        $feedback->save();
        
        $data=['LoggedUserInfo'=>RegistrationModel::where('cust_id','=',session('LoggedUser'))->first()];
        $feedback=FeedbackModel::where('cust_id','=',session('LoggedUser'))->with('customer')->get();
        return view('viewfb',$data,compact('feedback'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $feedback=FeedbackModel::find($id);
        $feedback->delete();

        $data=['LoggedUserInfo'=>RegistrationModel::where('cust_id','=',session('LoggedUser'))->first()];
        $feedback=FeedbackModel::where('cust_id','=',session('LoggedUser'))->with('customer')->get();
        return view('viewfb',$data,compact('feedback'))->with("<script>alert('Labor Deleted Successfully !!');</script>");
    }
}
