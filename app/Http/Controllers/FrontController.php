<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\applicants;
use App\Models\job_categories;
use App\models\vacancies;
use App\models\contacts;
use Illuminate\Http\Request;
use App\Models\ProductSimilarity;


class FrontController extends Controller
{
    protected $recom;
    public function index(Request $request)
    {  
      
        // $userId = Auth::user()->id;
        // $stat['stat'] =contacts::where('user_id', $userId)->first();

        $vacan =applicants::join('vacancies', 'applicants.vacanid', '=', 'vacancies.id')
          ->select('vacancies.*',applicants::raw('COUNT(vacanid) as count'))
          ->groupBy('vacanid')
          ->orderByRaw('COUNT(*) DESC')
          ->limit(2)
          ->get();
         $cate =  job_categories::all();

         
         $recom=[];
        
      
 
    
          return view('user/index', compact('vacan','cate','recom'));
            
    }
    
    public function Header(){
        return view('user/header');
    }
    public function ContactUs(){
        return view('user/contact');
    }
    public function ReceivedMessage(){
        $stat=[];
        $userId = Auth::user()->id;
        $stat=contacts::
        where('user_id', $userId)->get();

        return view('user/receivedMessage',compact('stat'));
    }
    public function sendMessage(Request $request)
    {
        $userId = Auth::user()->id;
        $send=new contacts();
        $send->user_id = $userId;
        $send->name=$request->name;
        $send->email=$request->email;
        $send->message=$request->message;
        $send->subject=$request->subject;
       
        $send->save();
       // return redirect('show');
        return redirect()->back()->with('status','data is Successfully Inserted');
        

    }
    public function JobList($time){
        $recom=[];
        $vacan= vacancies::where("time",$time)
        ->orwhere("category",$time)
        ->get();
        return view('user/job-list',compact('vacan','recom'));
    }
    public function JobDescription($time){
        $result= vacancies::where("post",$time)->get();
        return view('user/description',['desc'=>$result]);
    }
    public function JobList1(Request $request){
        $id= $request['post'] ??"";
     $id= $request['category'] ??"";
        $id= $request['location'] ??"";
        
      //  if($id!=null){
           $recom= [];
            $vacancy = [];
            $vacan = vacancies::where('post','LIKE','%'.$request->position.'%')
           -> where('category','LIKE','%'.$request->category.'%')
           ->where('address','LIKE','%'.$request->location.'%')->get();
          
             $recom=applicants::join('vacancies', 'applicants.vacanid', '=', 'vacancies.id')
             ->select('vacancies.*',applicants::raw('COUNT(vacanid) as count'))
            ->where('category',function($query) use ($request){
             $query->select('category')
             ->from('vacancies')
             ->where('post','LIKE','%'.$request->position.'%')
              ;
            })
             ->groupBy('vacanid')
             ->orderByRaw('COUNT(*) DESC')
             ->get();
           
            
         
             
        
            //dd($vacancy);
 
    //         if($request->position){
    //           $vacancy = vacancies::where('post','LIKE','%'.$request->position.'%')->get();
    //         }
           
         
    //      if($request->category){
            
    //      $vacancy = vacancies::where('category','LIKE','%'.$request->category.'%')->get();
    //     }
    //     if($request->location){
       
    //     // $vacancy = ->get();
    //    }
    //     if($request->position && $request->location && $request->category){
    //      $vacancy = vacancies::where('post','LIKE','%'.$request->position.'%') 
    //                          ->orwhere('address','LIKE','%'.$request->location.'%')
    //                          ->orwhere('category','LIKE','%'.$request->category.'%')
    //                          ->get();
                         
    //     }
 
        //}else{

           // $vacancy =applicants::join('vacancies', 'applicants.vacanid', '=', 'vacancies.id')
           
             // ->select('vacancies.*',applicants::raw('COUNT(vacanid) as count'))
             //->groupBy('vacanid')
             //->orderByRaw('COUNT(*) DESC')
            // ->limit(1)
            //->get();
            
            
           // $vacancy=vacancies::select('vacancies.*',applicants::raw('COUNT(vacanid) as count'))
         //->groupBy('vacanid')
          //->orderBy('count')
           //->get();
        //$vacancy= vacancies::all();
       // }
        return view('user/job-list',compact('vacan','recom'));
     
    }
    public function JobCategory(){
      
    
        $cate= job_categories::all();
    
        return view('user/category',compact('cate'));
    }
    public function JobCategory1($category){
        $recom=[];
        $result= vacancies::where("category",$category)->get();
       return view('user/catResult',compact('cate','recom'));
    }
   
    public function AboutUs()
    {
        return view('user/about');
    }
    public function Status()
    { 
        $userId = Auth::user()->id;
        $scount =applicants::
         where('user_id', $userId)
         ->where('status', 'Selected')
         ->orWhere('status', 'Rejected')
         ->count();
         session(['ncount'=>$scount]);
        $userId = Auth::user()->id;
        $stat=[];
        $stat =applicants::join('vacancies', 'applicants.vacanid', '=', 'vacancies.id')
        ->select('applicants.*',
        'vacancies.post')
        ->where('user_id', $userId)->get();
       
        return view('user/status',compact('stat'));
    }
    public function searchVacancy (Request $request){
        
    
        if($request->isMethod('post')){
        
        $key = $request->post;
        $location = $request->location;
        $category =$request->category;
        $vacancy=vacancies::with('type', 'location', 'availability')
        ->where('post' , 'like', $key)
        ->where('address' , 'like', $location)
        ->where('time' , 'like', $category)
        
        ->get();
    
            return view ('user/index', compact('vacancy'));
    
    
        }
    
      }
      public function recomend($id=null,$post){
        $products        = applicants::join('vacancies', 'applicants.vacanid', '=', 'vacancies.id')
        ->select('vacancies.*',applicants::raw('COUNT(vacanid) as count'))
       ->where('category',function($query) use ($post){
        $query->select('category')
        ->from('vacancies')
        ->where('post','LIKE','%'.$post.'%')
         ;
       })
        ->groupBy('vacanid')
        ->orderByRaw('COUNT(*) DESC')
        ->get()->toArray();
        $selectedId      = intval($id);
        $selectedProduct = $products[0];
    
        $selectedProducts = array_filter($products, function ($product) use ($selectedId) { return $product['id'] === $selectedId; });
        if (count($selectedProducts)) {
            $selectedProduct = $selectedProducts[array_keys($selectedProducts)[0]];
        }
    
        $productSimilarity = new ProductSimilarity($products);
        $similarityMatrix  = $productSimilarity->calculateSimilarityMatrix();
        $products          = $productSimilarity->getProductsSortedBySimularity($selectedId, $similarityMatrix);
        
        return view ('user/recomended', ['vacan'=>$products]);
      }

   
}
