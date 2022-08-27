@extends('user/layout')

 @section('body')
 <!-- Jobs Start -->
 <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Recomended For You</h1>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                
               
                   @if(isset($vacan))
                    @foreach($vacan as $vacan)
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="job-item p-4 mb-4">
                                <div class="row g-4">
                                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                  
                                        <img class="flex-shrink-0 img-fluid border rounded" src='assets2/img/com-logo-2.jpg'alt="" style="width: 80px; height: 80px;">
                                        <div class="text-start ps-4">
                                        <a class="d-flex align-items-center text-start mx-3 pb-3">
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
                                        @if($vacan['status'] =='Active' )
                                            <button class=" btnApply btn btn-primary" value="{{$vacan['id']}}">Apply Now</button>
                                       
                                        @else
                                            <button class=" btnApply btn btn-primary" disabled="" id="">Application Closed</button>
                                        @endif
                                           
                                        </div>
                                        <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>{{$vacan['created_at']}}</small>
                                    </div>
                                </div>
                            </div>
                            
                            @endforeach
                            @endif
                         

                        </div>
                    </div>
                </div>
            </div>
        </div>

       
       
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="job-item p-4 mb-4">
                                <div class="row g-4">
                                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                  
                                     
                         


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
        @endsection    