<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use File;
use App\models\job_categories;
use App\Models\status;
use Illuminate\Http\Request;

class Recrutiment extends Controller
{
    public function Status()
    {
        $result= status::all();
        return view('layouts/recrutiment_status',compact('result'));
    }
    public function ViewStatus($id)
    { 
      $jobstatus=status::find($id);
        return response()->json([
            'status'=>200,
          'jobstatus'=>$jobstatus
        ]);
      }
      public function update_status(Request $request)
      {
          $id= $request->input('id');
          $jobstatus = status::find($id);
          $jobstatus->status_label = $request->input('Sname');
         
          $jobstatus->update();
          return redirect()->back()->with('status','Student Updated Successfully');
      }
    public function Category()
    {
        $result= job_categories::all();
        return view('layouts/job_category',compact('result'));
    }
    public function insertStatus(Request $request)
    {
      $status=new status();
        $status->status_label = $request->status_label;
        
        $status->save();
        return redirect('Status');
       return redirect()->back()->with('status','data is Successfully Inserted');
    }
    public function deleteStatus(Request $request){
      $id= $request->input('jid');
      $jobstatus =status ::find($id);
     
      $jobstatus->delete();
      return redirect()->back()->with('status','Student Updated Successfully');
    }
    public function insertCategory(Request $request)
    {
      $category = new job_categories();
        $category->jobcategory = $request->category_label;
        
        if($request->hasfile('image'))
        {
        $file=$request->file('image');
        $extension=$file->getClientOriginalExtension();
        $filename=time().'.'.$extension;
       $url = Storage::disk('public')->putFileAs('', $file, $filename);
       $category->image=$filename;
        }else{
         return $request;
        $category->image= '';

        }
        $category->save();
        return redirect('Category');
       return redirect()->back()->with('category','data is Successfully Inserted');
    }
    public function deleteJobCat(Request $request){
      $id= $request->input('jid');
      $category =job_categories ::find($id);
     
      $category->delete();
      return redirect()->back()->with('status','Student Updated Successfully');
    }
    public function ViewJob($id)
    { 
      $jobCat=job_categories::find($id);
        return response()->json([
            'status'=>200,
          'jobCat'=>$jobCat
        ]);
      }
      public function update_category(Request $request)
      {
          $id= $request->input('id');
          $jobCat = job_categories::find($id);
          $jobCat->jobcategory = $request->input('Cname');
         
          $jobCat->update();
          return redirect()->back()->with('status','Student Updated Successfully');
      }
}
