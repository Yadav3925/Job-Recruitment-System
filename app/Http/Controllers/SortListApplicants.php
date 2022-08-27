<?php

namespace App\Http\Controllers;
use App\models\vacancies;
use App\Models\companies;
use App\Models\applicants;
use App\models\status;
use Illuminate\Http\Request;

class SortListApplicants extends Controller
{
    public function sortList(Request $request){
        $status=status::all();  
        $id= $request['vacancy'] ??"";
        $id= $request['company'] ??"";
        
           $user = [];
           if($id!=null){

           $user=applicants::join('vacancies', 'applicants.vacanid', '=', 'vacancies.id')
           ->select( 'applicants.*', 'vacancies.post', 'vacancies.company')
          // ->where('vacancies.skills','=','applicants.skill')
           ->where('vacancies.post','LIKE','%'.$request->vacancy.'%')
          ->where('vacancies.company','LIKE','%'.$request->company.'%')
          //->groupBy('vacanid')
           
         
          ->get();
       
           }else{
       
           }
           $company=companies::all();
           $vacancy=vacancies::all();
        return view('layouts/sortlistApplicants',compact('company','vacancy','user','status'));
    }
}
