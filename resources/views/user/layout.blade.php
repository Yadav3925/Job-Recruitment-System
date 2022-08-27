<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>JobRecruitment</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet 
    <link href="{{asset('assets2/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets2/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    Customized Bootstrap Stylesheet -->
    <link href="{{asset('assets2/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Stylesheet -->
    <link href="{{asset('assets2/css/style.css')}}" rel="stylesheet">
</head>

<body>



    <div class="container-xxl bg-white p-0">
      
       <!-- Navbar Start 
 <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
            <a  class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
                <h1 class="m-0 text-primary">JobRecruitment</h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="index" class="nav-item nav-link ">Home</a>
                    <a href="AboutUs" class="nav-item nav-link">About</a>
                    <a href="JobList" class="nav-item nav-link">Job List</a>
                    <a href="JobCategory" class="nav-item nav-link">Job Category</a>
                    <a href="ContactUs" class="nav-item nav-link">Contact</a>
                   
                </div>
                
                <a class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block" data-toggle="modal" data-target="#apply" href="">Post A Job<i class="fa fa-arrow-right ms-3"></i></a>
            </div>
        </nav>
        Navbar End -->
        @include('user/nav')
        @yield('body')
           <!-- Footer Start -->
          <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Company</h5>
                        <a class="btn btn-link text-white-50" href="AboutUs">About Us</a>
                        <a class="btn btn-link text-white-50" href="ContactUs">Contact Us</a>
                        <a class="btn btn-link text-white-50" href="">Our Services</a>
                        <a class="btn btn-link text-white-50" href="">Privacy Policy</a>
                        <a class="btn btn-link text-white-50" href="">Terms & Condition</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Quick Links</h5>
                        <a class="btn btn-link text-white-50" href="AboutUs">About Us</a>
                        <a class="btn btn-link text-white-50" href="ContactUs">Contact Us</a>
                        <a class="btn btn-link text-white-50" href="">Our Services</a>
                        <a class="btn btn-link text-white-50" href="">Privacy Policy</a>
                        <a class="btn btn-link text-white-50" href="">Terms & Condition</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Contact</h5>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Darbarmarga, Kathmandu, Nepal</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>980000000</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">JobRecruitment</a>, All Right Reserved. 
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->

        <!-- Back to Top 
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>\
        -->
    </div>


<script src="{{asset('assets2/js/main.js')}}"></script>
</body>

</html>


       