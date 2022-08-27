<?php

namespace App\Http\Controllers;

use App\Models\setting as ModelsSetting;
use App\models\contacts;
use App\models\settting;
use Illuminate\Http\Request;

class Setting extends Controller
{

   
    public function Message()
    {   
        $result= contacts::all();
        return view('layouts/message',compact('result'));
    }

    public function viewMessage($id)
    { 
      $usmessage=contacts::find($id);
        return response()->json([
            'status'=>200,
          'usmessage'=>$usmessage
        ]);
    }
    public function updateMessage($id)
    { 
      $umessage=contacts::find($id);
        return response()->json([
            'status'=>200,
          'umessage'=>$umessage
        ]);
    }

    public function editMessage(Request $request)
    {
        $id= $request->input('mid');
        $umessage= contacts::find($id);
        $umessage->subject = $request->input('subject');
        $umessage->message = $request->input('message');
       
        $umessage->update();
        return redirect()->back()->with('status','Student Updated Successfully');
    }

    public function deleteMessage(Request $request){
        $id= $request->input('aid');
        $umessage= contacts::find($id);
        $umessage->delete();
        return redirect()->back()->with('status','Student Updated Successfully');
      }
    public function SiteSetting()
    {
        $result= ModelsSetting::all();
        return view('layouts/site_setting',compact('result'));
    }
}
