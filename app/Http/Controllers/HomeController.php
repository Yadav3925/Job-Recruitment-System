<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\models\status;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\models\applicants;
use File;
use Illuminate\Support\Facades\Storage;
use App\models\User;
use App\Models\companies;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $scount =applicants::where('status', 'new')
         ->count();
         session(['admincount'=>$scount]);
       $vacan['vacan'] =applicants::join('vacancies', 'applicants.vacanid', '=', 'vacancies.id') 
       ->select('vacancies.post','vacancies.company','vacancies.category',applicants::raw('COUNT(vacanid) as count'))
       ->groupBy('vacanid')
       ->orderByRaw('COUNT(*) DESC')
       ->limit(1)
       ->get();
 
       $vljob['vljob'] =applicants::join('vacancies', 'applicants.vacanid', '=', 'vacancies.id')  
       ->select('vacancies.post','vacancies.company','vacancies.category',applicants::raw('COUNT(vacanid) as count'))
       ->groupBy('vacanid')
       ->orderByRaw('COUNT(*) ASC')
       ->limit(1)
       ->get();
      
       
       
    $scan=applicants::where('status','selected')->count();
    $rcan=applicants::where('status','Rejected')->count();
    $ncan=applicants::where('status','new')->count();
    $cCount = companies::count();
    $tapplicants=applicants::count();
        return view('dashboard',compact('cCount','tapplicants','scan','rcan','vacan','vljob','ncan'));
    }
    public function store(Request $request)
    {
      $request->validate([
        'name'=>'required',
        'email'=>'required|email',
        'address'=>'required',
        'name'=>'required',
        'skill'=>'required',
        'experiance'=>'required',
        'additional'=>'required',
        'resume'=>'required'
      ]);
        $user_id = Auth::user()->id;
        $apply=new applicants();
        $apply->user_id = $user_id;
        $apply->vacanid=$request->vid;
        $apply->name=$request->name;
        $apply->email=$request->email;
        $apply->address=$request->address;
       
        $apply->skill=$request->skill;
        $apply->experiance=$request->experiance;
        $apply->coverletter=$request->additional;
         
       
        $apply->resume=$request->resume;
       // $apply->testimonials=$request->testimonials;
        $apply->save();
       // return redirect('show');
        return redirect()->back()->with('status','data is Successfully Inserted');
        

    }
    public function applicant(Request $request)
    {   
         $status=status::all();
         $user = [];
         $id= $request['position_filter'] ??"";
         if($id!=null){
           $user=applicants::join('vacancies', 'applicants.vacanid', '=', 'vacancies.id')
           ->select( 'applicants.*', 'vacancies.post', 'vacancies.company')
           ->where('vacancies.post','LIKE',"%$id%")
           ->orwhere('applicants.name','LIKE',"%$id%")
           ->orwhere('vacancies.company','LIKE',"%$id%")
           ->orwhere('applicants.status','LIKE',"%$id%")
           ->paginate(3);
         }else{
          $user= applicants::join('vacancies', 'applicants.vacanid', '=', 'vacancies.id')
          ->select(
            'applicants.*',
            'vacancies.post', 'vacancies.company'
            
           )
           ->where('applicants.status','new')
          ->paginate(6);
         }
         $data = compact('user','status');
         return view('layouts/applicants',$data);
    }
    /*
    public function applicant1(Request $request)
    {
       $id= $request->input('position_filter');
      $data = array(
       'user'=> applicants::all(),
       'applicant'=> applicants::where("post",$id)->get(),
       
       );
      return view('layouts/applicants',$data);
    }*/
    public function dashboard()
    {
        return view('dashboard');
    }
    public function manageApplication()
    {
        return view('manage_application');
    }
    public function viewResume($id)
    {
       $resume=applicants::find($id);
        return view('layouts/viewResume',compact('resume'));
    }
    public function applicant_detail($id) {
        return applicants::findOrFail($id);
    }
    
    /*public function update(Request $request)
    {
        $id =$request->input('id');
        $data=applicants::where('id',$id)->get();
      
        return response()->json($data[0]);
       
    }*/
    public function update($id)
    { 
      $applicants=applicants::find($id);
        return response()->json([
            
          'applicants'=>$applicants,
        ]);
      }
      public function view($id)
      { 
        $applicants= applicants::join('vacancies', 'applicants.vacanid', '=', 'vacancies.id')
    
          ->select(
            'applicants.*',
            'vacancies.*',
            
           )->find($id);
       
          return response()->json([
              'status'=>200,
            'applicants'=>$applicants,
          ]);
        }
        public function update_application(Request $request)
        {
            $id= $request->input('id');
            $applicants = applicants::find($id);
           // $applicants->name = $request->input('fname');
          //  $applicants->post = $request->input('post');
           // $applicants->email = $request->input('email');
            $applicants->coverletter= $request->input('cover_letter');
            $applicants->status = $request->input('astatus');
            $applicants->update();
            return redirect()->back()->with('status','Student Updated Successfully');
        }
        public function deleteApplicant(Request $request){
          $id= $request->input('aid');
          $applicants = applicants::find($id);
          $applicants->delete();
          return redirect()->back()->with('status','Student Updated Successfully');
        }
}
