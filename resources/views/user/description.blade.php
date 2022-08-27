@extends('user/layout')
<!--Job Description Start-->
@section('body')
<div class="row" style="margin: 20px;background-color:Lavender;">
  <div class="col-sm-6" style="margin-top: 20px;">
    <div class="card">
      <div class="card-body" style="border: 2px solid DodgerBlue;">
        <u><h3 class="card-title" style="text-align: center;">About Job</h3></u>
        @foreach($desc as $des)
        <div class="job-item p-1 mb-1"  style="background-color:LightCyan ;border: 2px solid DodgerBlue;">
        <u> <h6 style="text-align: center;">Status</h6></u>
       
         <p style="text-align: center;">{{$des['status']}}</p>
    
         
         <u> <h6 style="text-align: center;">Vacancy Number</h6></u>
         <p style="text-align: center;">{{$des['availabiliy']}}</p>
        </div>
        <div class="job-item p-1 mb-1"  style="background-color:LightCyan ;border: 2px solid DodgerBlue;">
        <u> <h6 style="text-align: center;">Job Name</h6></u>
         <p style="text-align: center;">{{$des['post']}}</p>
        </div>

      <div  class="job-item p-1 mb-1"  style="background-color:LightCyan ;border: 2px solid Tomato;">
       <u><h6 style="text-align:center ;">Company</h6></u>
       <p style="text-align: center;">{{$des['company']}}</p>
     </div>

    <div  class="job-item p-1 mb-1" style="background-color:LightCyan ;border: 2px solid Violet;">
     <u><h6 style="text-align: center;">Skills</h6></u>
      <p style="text-align: center;">{{$des['skills']}}</p>
    </div>

   <div class="job-item p-1 mb-1"  style="background-color:LightCyan ;border: 2px solid DodgerBlue;">
   <u><h6 style="text-align: center;">Address</h6></u>
     <p style="text-align: center;">{{$des['address']}}</p>
   </div>

   <div class="job-item p-1 mb-1"   style="background-color:LightCyan ;border: 2px solid Tomato;">
   <u><h6 style="text-align: center;">Salary Range</h6></u>
     <p style="text-align: center;">{{$des['salaryrange']}}</p>
   </div>

   <div  class="job-item p-1 mb-1" style="background-color:LightCyan ;border: 2px solid Violet;">
   <u><h6 style="text-align: center;">Time</h6></u>
     <p style="text-align: center;">{{$des['time']}}</p>
   </div>
  
   
      </div>
      
    </div>
    
  </div>
  

  <div class="col-sm-6" style="margin-top: 20px;margin-left:-27px; text-align: center;">
    <div class="card">
      <div class="card-body" style="border: 2px solid DodgerBlue;">
        <u><h3 class="card-title">Description</h3></u>
        <p class="card-text">
         
        {{$des['description']}}
        </p>
      
      </div>
    </div>
   @if($des->status =='Active' )
   <button class=" btnApply btn btn-primary" value="{{$des['id']}}">Apply Now</button>
   @else
      <button class=" btnApply btn btn-primary" disabled="" id="">Application Closed</button>
  @endif

  </div>
</div>

@endforeach
@include('user/applymodal')



<script Type="text/javascript">
$(document).ready(function(){
 
    $(".btnApply").on('click',function(){
        var id=$(this).val();
       // alert(id);
        $("#apply").modal("show");
        $('#vid').val(id);

    });
});
</script>
<!--Job Details End-->
@endsection


