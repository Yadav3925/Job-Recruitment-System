<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\vacancies;
use App\models\companies;
use App\Http\Controllers\Validator;
use App\Models\applicants;
use App\Models\job_categories;

class VacancyController extends Controller
{
    public function jobs()
    {
        $company=companies::all();
        $vacancy=vacancies::all();
        $cate=job_categories::all();
        return view('layouts/jobs',compact('vacancy','cate','company'));
    }
    public function Company()
    { 
        $result= companies::all();
        return view('layouts/company',compact('result'));
    }
    public function insertCompany(Request $request)
    {
      $inCompany=new companies();
        $inCompany->name = $request->Cname;
        $inCompany->email = $request->email;
        $inCompany->address = $request->address;
        $inCompany->contact = $request->contact;
        $inCompany->panno = $request->pano;
        $inCompany->save();
        
       return redirect()->back()->with('status','data is Successfully Inserted');
    }
    public function updateCompany($id)
    { 
      $company=companies::find($id);
        return response()->json([
            'status'=>200,
          'company'=>$company,
        ]);
      }
    public function deleteCompany(Request $request){
      $id= $request->input('cid');
      $company = companies::find($id);
      $company->delete();
      return redirect()->back()->with('status','Student Updated Successfully');
    }
    public function editCompany(Request $request)
    {
        $id= $request->input('id');
        $company = companies::find($id);
        $company->name = $request->input('cname');
        $company->address = $request->input('address');
        $company->email = $request->input('email');
        $company->contact = $request->input('contact');
        $company->panno = $request->input('panno');
        $company->update();
        return redirect()->back()->with('status','Student Updated Successfully');
    }
    public function insertVacancy(Request $request)
    {
      $inCompany=new  vacancies();
        $inCompany->post = $request->position;
        $inCompany->company = $request->company;
        $inCompany->availabiliy = $request->availability;
        $inCompany->status = $request->status;
        $inCompany->description= $request->description;
        $inCompany->address = $request->address;
        $inCompany->skills = $request->skill;
        $inCompany->salaryrange = $request->salary;
        $inCompany->time = $request->time;
        $inCompany->category = $request->category;
        $inCompany->save();
        
       return redirect()->back()->with('status','data is Successfully Inserted');
    }
    public function updateVacancy($id)
    { 
      $vacancy=vacancies::find($id);
        return response()->json([
            'status'=>200,
          'vacancy'=>$vacancy,
        ]);
      }
      public function editVacancy(Request $request)
      {
          $id= $request->input('id');
          $vacancy = vacancies::find($id);
      
          $vacancy->post = $request->input('vposition');
          $vacancy->availabiliy = $request->input('vavailability');
          $vacancy->status = $request->input('vstatus');
          $vacancy->description = $request->input('vdescription');
          $vacancy->salaryrange = $request->input('vsalary');
          $vacancy->time = $request->input('vtime');
          $vacancy->category = $request->input('vcategory');
          $vacancy->address = $request->input('vaddress');
          $vacancy->skills = $request->input('vskill');
          
          $vacancy->update();
          return redirect()->back()->with('status','Student Updated Successfully');
      }
      public function deleteVacancy(Request $request){
        $id= $request->input('vid');
        $vacancy=vacancies::find($id);
       
        $vacancy->delete();
        return redirect()->back()->with('status','Student Updated Successfully');
      }
     
  }
  

