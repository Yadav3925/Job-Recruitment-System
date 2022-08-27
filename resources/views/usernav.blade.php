<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    


    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
     @include('header')
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
    <img src="{{asset('assets/img/logo.png')}}" width="100" height="70" alt="">
     
      <span class="logo_name">Recruitment System</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="{{('home')}}" class="active">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="{{url('applicant')}}">
            <i class='bx bx-box' ></i>
            <span class="links_name">Applicants</span>
          </a>
        </li>
        <li>
          <a href="{{url('Category')}}">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Catagoery</span>
          </a>
        </li>
        <li>
          <a href="{{('Company')}}">
            <i class='bx bx-pie-chart-alt-2' ></i>
            <span class="links_name">Company</span>
          </a>
        </li>
        <li>
          <a href="{{('jobs')}}">
            <i class='bx bx-coin-stack' ></i>
            <span class="links_name">Vacancy</span>
          </a>
        </li>
        <li>
          <a href="Message">
            <i class='bx bx-book-alt' ></i>
            <span class="links_name">Message</span>
          </a>
        </li>
        <li>
          <a href="{{('Status')}}">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Status</span>
          </a>
        </li>
        <li>
          <a href="{{url('sortList')}}">
            <i class='bx bx-box' ></i>
            <span class="links_name">SortList</span>
          </a>
        </li>
        
        
        <li>
          <a href="{{('printReport')}}">
          <i class='bx bx-book-alt' ></i>
            <span class="links_name">Report</span>
          </a>
        </li>
      
        
        
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Dashboard</span>
      </div>
      
      <a href="{{('applicant')}}" class="btn" style="float: right;margin-left:600px;margin-top:0px"> 
           <span class="fa fa-bell"></span>
          
		       <span class="badge">{{session('admincount')}}</span> 
           
                                
      </a>
     
                               
                        <div class="profile-details">
     
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                      
                                    </form>
                                </div>
      
    </nav>
    
    <div class="home-content">
      
      @yield('main')
    </div> 
  </section>
  
  <script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
 </script>

</body>
</html>

