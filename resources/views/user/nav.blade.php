 <!-- Navbar Start -->

 <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a  class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
                <h1 class="m-0 .text-dark">JobRecruitment</h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="{{url('index')}}" class="nav-item nav-link ">Home</a>
                    <a href="{{url('AboutUs')}}" class="nav-item nav-link">About</a>
                    <!--<a href="{{url('JobList1')}}" class="nav-item nav-link">Job List</a>-->
                    <a href="{{url('JobCategory')}}" class="nav-item nav-link">Job Category</a>
                   <!-- <a href="{{url('ContactUs')}}" class="nav-item nav-link">Contact</a>-->
                   <!-- <a href="{{url('Result')}}" class="nav-item nav-link">Your Status</a>-->
                  
                    <div class="dropdown show">
                 <a class="nav-item nav-link"  id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Message
                </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item" href="{{url('ContactUs')}}">Send Message</a>
    <a class="dropdown-item" href="{{url('ReceivedMessage')}}">Receive Message</a>
  
  </div>
</div>
    
                   <!-- <a href="{{url('/login')}}" class="nav-item nav-link">Login</a>-->
                    @if (Route::has('login'))
                      @auth
                       <a href="{{ url('/index') }}" class="nav-item nav-link"></a>
                    @else
                   <a href="{{ route('login') }}" class="nav-item nav-link">Log in</a>
                     @if (Route::has('register'))
                     <a href="{{ route('register') }}" class="nav-item nav-link">Register</a>
                     @endif
                      @endauth
                      @endif
                    
                   <a class="nav-item nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                     </a>

                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                       @csrf
       
                     </form>
                     <a href="{{('Result')}}" class="nav-item nav-link" style="float: right;margin-left:10px;margin-top:0px"> 
                   <span class="fa fa-bell"></span>
		              <span class="badge" style="background-color:green">{{session('ncount')}}</span> 
                  </a>
                </div>
                

            </div>
        </nav>
        <!-- Navbar End -->