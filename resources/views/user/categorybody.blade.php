<div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Explore By Category</h1>
               
                <div class="row g-4">
                @foreach($cate as $cate)
                <img class="flex-shrink-0 img-fluid border rounded" src="{{ ('upload/category/'.$cate->image) }}" alt="" style="width: 80px; height: 80px;">
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a class="cat-item rounded p-4" href="{{ url('JobList' , [$cate->jobcategory]) }}">
                            <h6 class="mb-3">{{$cate['jobcategory']}}</h6>
                          
                        </a>
                    </div>
                    
                    @endforeach
                    </div>
                   
            </div>
           
        </div>
      
        @include('user/applymodal')