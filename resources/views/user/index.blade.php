@extends('user/layout')
@section('body')


         <!-- Background image -->
<div>
  <img src="assets2/img/background.jpg" width="1262" height="700"  alt="">
 </div>
<!-- Background image -->
        <!-- Search Start -->
        <div class="container-fluid bg-light mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
            <div class="container">
                <div class="row g-2">
                    <div class="col-md-10">
                        <div class="row g-2">
                            <div class="col-md-8">
                            <form action="{{url('JobList1')}}" method="GET">
                                @csrf
                            <input type="text" class="form-control border-0" placeholder="Keyword" id="position" name="position"/>
                            </div>
                          <!--  <div class="col-md-4">
                                <select class="form-select border-0"id="category" name="category">
                                    <option value='' selected>Category</option>
                                    @foreach($cate as $vac)
                                    <option value="{{$vac['category']}}">{{$vac['jobcategory']}}</option>
                                  
                                    @endforeach
                                </select>
                               </div>
                            <div class="col-md-4">
                                <select class="form-select border-0"name="location" id="location">
                                    <option value='' selected>Location</option>
                                    @foreach($vacan as $vac)
                                    <option value="{{$vac['address']}}">{{$vac['address']}}</option>
                                   
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>-->
                    <div class="col-md-2">
                        <button class="btn btn-primary border-0 w-100" type="submit">Search</button>
                    </div>
                </div>
       </form>
            </div>
        </div>

        @include('user/joblistbody')
      
        

        @include('user/categorybody')

     
        @include('user/aboutbody')
      
       
        @include('user/applymodal')
        @endsection
      

       