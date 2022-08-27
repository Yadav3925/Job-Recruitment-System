
 <!-- Jobs Start -->
 <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Job Listing</h1>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                
                <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active" data-bs-toggle="pill" href="">
                                <h6 class="mt-n1 mb-0">Most Applied Job/search Job</h6>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 pb-3 active"  href="{{ url('JobList' , [ 'time' => 'Full Time']) }}">
                                <h6 class="mt-n1 mb-0">Full Time</h6>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 me-0 pb-3 active"  href="{{ url('JobList' , [ 'time' => 'Part Time']) }}">
                                <h6 class="mt-n1 mb-0">Part Time</h6>
                            </a>
                        </li>
                    </ul>
                   
                    @foreach($vacan as $vacan)
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="job-item p-4 mb-4">
                                <div class="row g-4">
                                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                  
                                        <img class="flex-shrink-0 img-fluid border rounded" src='assets2/img/com-logo-2.jpg'alt="" style="width: 80px; height: 80px;">
                                        <div class="text-start ps-4">
                                        <!--<a class="d-flex align-items-center text-start mx-3 pb-3"  href="{{ url('description' , [$vacan->post]) }}">
                                            <h5 class="mb-3">{{$vacan['post']}}</h5>
                                        </a>-->
                                        <a class="d-flex align-items-center text-start mx-3 pb-3"  href="{{ url('recomend' , [$vacan->id,$vacan->post]) }}">
                                            <h5 class="mb-3">{{$vacan['post']}}</h5>
                                        </a>
                                            <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{$vacan['address']}}</span>
                                            <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>{{$vacan['time']}}</span>
                                            <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>{{$vacan['salaryrange']}}</span>
                                            <a class="text-truncate me-0"href="{{ url('description' , [$vacan['post']]) }}">More Details</a>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                        <div class="d-flex mb-3">
                                        @if($vacan->status =='Active' )
                                            <button class=" btnApply btn btn-primary" value="{{$vacan['id']}}">Apply Now</button>
                                       
                                        @else
                                            <button class=" btnApply btn btn-primary" disabled="" id="">Application Closed</button>
                                        @endif
                                            <!--<a class="btn btn-primary" data-toggle="modal" data-target="#apply" data-id="{{ $vacan->id }}">Apply Now</a>-->
                                        </div>
                                        <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>{{$vacan['created_at']}}</small>
                                    </div>
                                </div>
                            </div>
                            
                            @endforeach
                           


                        </div>
                    </div>
                </div>
            </div>
        </div>

       <h1><b><center>Recomended For You</center></b></h1>
        
        @foreach($recom as $rec)
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="job-item p-4 mb-4">
                                <div class="row g-4">
                                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                  
                                        <img class="flex-shrink-0 img-fluid border rounded" src='assets2/img/com-logo-2.jpg'alt="" style="width: 80px; height: 80px;">
                                        <div class="text-start ps-4">
                                        <a class="d-flex align-items-center text-start mx-3 pb-3"  href="{{ url('description' , [$vacan->post]) }}">
                                            <h5 class="mb-3">{{$rec->post}}</h5>
                                        </a>
                                            <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{$rec->address}}</span>
                                            <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>{{$rec->time}}</span>
                                            <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>{{$rec->salaryrange}}</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                        <div class="d-flex mb-3">
                                        @if($rec->status =='Active' )
                                            <button class=" btnApply btn btn-primary" value="{{$rec->id}}">Apply Now</button>
                                       
                                        @else
                                            <button class=" btnApply btn btn-primary" disabled="" id="">Application Closed</button>
                                        @endif
                                            <!--<a class="btn btn-primary" data-toggle="modal" data-target="#apply" data-id="{{ $vacan->id }}">Apply Now</a>-->
                                        </div>
                                        <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>{{$rec->created_at}}</small>
                                    </div>
                                </div>
                            </div>
                            
                            @endforeach
                         


                        </div>
                    </div>
                </div>
            </div>
        </div>








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
        <!-- Jobs End -->
     