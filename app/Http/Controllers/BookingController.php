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
        $bookings=BookingModel::sortable()->with('customer','construction')->orderBy('id','desc')->paginate(10);
        return view('viewallbookings',compact('bookings'));

  
    }
    public function bsearch(Request $request)
    {
        $getsearch=request('search');
        $bookings=BookingModel::query()->sortable()->where('b_name','LIKE',"%{$getsearch}%")->with('customer','construction')->orderBy('id','desc')->paginate(50);
        return view('viewallbookings',compact('bookings'));
    }

    public function indexcust()
    {
        $data=['LoggedUserInfo'=>RegistrationModel::where('cust_id','=',session('LoggedUser'))->first()];
        $booking=BookingModel::where('cust_id','=',session('LoggedUser'))->with('customer','construction')->get();
        return view('viewbooking',$data,compact('booking'));

    }
    public function viewwork()
    {
        $work = workModel::with('booking','customer')->get();
        //$booking=BookingModel::with('customer',$work->booking->id)->get(); 
        return view('work',compact('work'));
    }      
                
    public function search(Request $request)
    {
        $getsearch=request('search');
        $work=WorkModel::query()->where('Completion','LIKE',"%{$getsearch}%")->with('booking','customer')->get();
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

    public function delete($id)
    {
        $book=BookingModel::find($id);
        $book->delete();
        $data=['LoggedUserInfo'=>RegistrationModel::where('cust_id','=',session('LoggedUser'))->first()];
        $booking=BookingModel::where('cust_id','=',session('LoggedUser'))->with('customer','construction')->get();
        return view('viewbooking',$data,compact('booking'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'bname' => 'required|min:2|max:255|regex:/^[a-z A-Z]+$/',
            'email' => 'required|email',
            'phone' => 'required|min:10|max:12',
            'cons'  => 'required'
        ]);

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

        $data=['LoggedUserInfo'=>RegistrationModel::where('cust_id','=',session('LoggedUser'))->first()];
        $cons=ConstructionModel::select('cons_id','cons_type')->get();
        $booking=BookingModel::where('cust_id','=',session('LoggedUser'))->with('customer','construction')->get();
        return view('/viewbooking',$data,compact('cons','booking'))->with('success,Successfully Added!');
        
    }

    public function work($id)
    {
        $work=WorkModel::find($id);
        return view('editwork',compact('work'));
    }
    public function workupdate(Request $request, $id)
    {
        $validated = $request->validate([
            'cdate' => 'required|'

        ]);
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

        $photo->move(public_path('/assets/img/works/'),$name);
   
        
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

            $bookings=BookingModel::sortable()->with('customer','construction')->orderBy('id','desc')->paginate(10);
            return view('viewallbookings',compact('bookings'));
       
    }
    public function reject(Request $request,$id)
    {
 
            $book=BookingModel::find($id);
            $book->status='Rejected';
            $book->save();
            
            $bookings=BookingModel::sortable()->with('customer','construction')->orderBy('id','desc')->paginate(10);
        return view('viewallbookings',compact('bookings'));
   
    }
}
