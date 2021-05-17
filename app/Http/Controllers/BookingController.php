<?php

namespace App\Http\Controllers;
use App\Models\BookingModel;
use App\Models\RegistrationModel;
use App\Models\ConstructionModel;
use App\Models\WorkModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
       // $custm=DB::select('select * from registration_models r,booking_models b where r.cust_id=b.cust_id');  
            //return view('viewallbookings',compact('booking','const',''));
        $bookings=BookingModel::with('customer','construction')->orderBy('id','desc')->get();
        return view('viewallbookings',compact('bookings'));

  
    }
    public function indexcust()
    {
        
        $data=['LoggedUserInfo'=>RegistrationModel::where('cust_id','=',session('LoggedUser'))->first()];
        $booking=BookingModel::where('cust_id','=',session('LoggedUser'))->get();
        foreach ($booking as $book) {
            $getconst=$book->cons_id;}
        $const=ConstructionModel::where('cons_id','=',$getconst)->get();
        foreach ($const as $cons) {
            $getcons=$cons->cons_type;}
        $name=RegistrationModel::where('cust_id','=',session('LoggedUser'))->get();
        foreach ($name as $n) {
            $getname=$n->cust_name;}
        return view('viewbooking',$data,compact('booking','getcons','getname'));

    }
    public function viewwork()
    {
        $work = workModel::with('booking','customer')->get();
        //$booking=BookingModel::with('customer',$work->booking->id)->get(); 
          
        return view('work',compact('work'));
    }      
                



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cons=ConstructionModel::select('cons_id','cons_type')->get();
        $data=['LoggedUserInfo'=>RegistrationModel::where('cust_id','=',session('LoggedUser'))->first()];
        return view('booking',$data,compact('cons'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */




    public function store(Request $request)
    {
        
        $getbname=request('bname');
        $getemail=request('email');
        $getbphone=request('phone');
        $getbdate=request('bdate');

        $getlab=$request->input('lab');
        $getmat=$request->input('mat');
        $getcons=request('cons');

        $booking=new BookingModel();
        $data=['LoggedUserInfo'=>RegistrationModel::where('cust_id','=',session('LoggedUser'))->first()];
        foreach($data as $lo)
        {$getcust=$lo->cust_id;}

        $booking->cust_id=$getcust;
        $booking->b_name=$getbname;
        $booking->email=$getemail;
        $booking->b_phone=$getbphone;
        $booking->b_date=$getbdate;
        $booking->l_id=$getlab;
        $booking->m_id=$getmat;
        $booking->cons_id=$getcons;

        $booking->save();

        $cons=ConstructionModel::select('cons_id','cons_type')->get();
        return view('booking',compact('cons'))->with('Success !');
        
    }

    public function work($id)
    {
        $work=WorkModel::find($id);
        return view('editwork',compact('work'));
    }
    public function workupdate(Request $request, $id)
    {

        $work=WorkModel::find($id);
        if ($request->hasFile('wimg')) 
        {
            $request->validate([
                'image' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            ]);
        }

        $bid=DB::table('work_models')
            ->where('w_id','=',$work->w_id)
            ->get();
            foreach($bid as $b)
            {$bookid=$b->id;}
        $status=request('stat');
        $photo=$request->file('wimg');
        $cdate=request('cdate');
        $name=$photo->getClientOriginalName($photo);

        $photo->move(public_path('assets/works/img'),$name);
   
        $work->id=$bookid;
        $work->status=$status;
        $work->photo=$name;
        $work->Completion=$cdate;

        $work->save();
        echo "<script>alert('Work Updated Successfully !!');window.location='/works';</script>";
    }

    public function workdelete($id)
    {
        $work=WorkModel::find($id);
        $work->status="Dropped";
        $work->save();
        echo "<script>alert('Work Dropped !!');window.location='/works';</script>";
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
        //
    }
    public function print()
    {
        $bookings=BookingModel::with('customer','construction')->where('status','!=','Rejected')->orderBy('id','desc')->get();
                return view('bookingreport',compact('bookings'));
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
    public function accept($id)
    {
            $book=BookingModel::find($id);
            $book->status='Booking Confirmed';

            $work=new WorkModel();
            $work->id=$id;

            $book->save();
            $work->save();

            $bookings=BookingModel::all();
            $const=ConstructionModel::all();

            return view('viewallbookings',compact('bookings','const'));
       
    }
    public function reject(Request $request,$id)
    {
 
            $book=BookingModel::find($id);
            $book->status='Rejected';
            $book->save();
            
            $bookings=BookingModel::all();
            $const=ConstructionModel::all();

            return view('viewallbookings',compact('bookings','const'));
   
    }
}
