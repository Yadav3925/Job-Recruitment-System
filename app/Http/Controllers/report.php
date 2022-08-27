<?php

namespace App\Http\Controllers;
use App\models\applicants;
use App\Models\companies;
use Illuminate\Http\Request;

class report extends Controller
{
    public function srApplicants($id){
        $result=applicants::join('vacancies', 'applicants.vacanid', '=', 'vacancies.id')
        ->select(
            'applicants.*',
            'vacancies.post', 'vacancies.company'
            
           )
        -> where("applicants.status",$id)
         
        ->get();
       return view('layouts/reportTable',compact('result'));
    }
    public function printReport(){
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
       $cCount = companies::count();
      $tapplicants=applicants::count();

    
      return view('layouts/printReport',compact('cCount','tapplicants','scan','rcan','vacan','vljob'));
    }
}