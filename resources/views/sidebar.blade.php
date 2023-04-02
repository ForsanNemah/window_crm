<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{config('app.name')}}</title>

  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{url('admin')}}/assets/img/favicon.png" rel="icon">
  <link href="{{url('admin')}}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="{{url('admin')}}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{url('admin')}}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{url('admin')}}/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="{{url('admin')}}/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="{{url('admin')}}/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="{{url('admin')}}/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="{{url('admin')}}/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{url('admin')}}/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Nice{{url('admin')}} - v2.5.0
  * Template URL: https://bootstrapmade.com/nice-{{url('admin')}}-bootstrap-{{url('admin')}}-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->



</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="{{url('admin')}}/assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">{{config('app.name')}}</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <!--
    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->
  
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->
  
        
          <!-- End Notification Dropdown Items -->
      
        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown">

          <!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{url('admin')}}/assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">





{{    Auth::user()->name;     }}
<br>
{{    Auth::user()->department;     }}


            </span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <!--
            <li class="dropdown-header">
              <h6>Kevin Anderson</h6>
              <span>Web Designer</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>

          -->
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                 {{ __('Logout') }}
             </a>

             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                 @csrf
             </form>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">


 

        <a class="nav-link " href="{{route('persons.index')}}">
          <i class="bi bi-grid"></i>
          <span>Leads</span>
        </a>
        

@if ( Auth::user()->user_type==0)
    




<a class="nav-link " href="{{route('emps.index')}}">
  <i class="bi bi-grid"></i>
  <span>Employees</span>
</a>
@endif










        <a class="nav-link " href="{{route('leads_report')}}">
          <i class="bi bi-grid"></i>
          <span> Follow up Reports</span>
        </a>



        <a class="nav-link " href="{{route('complaint_report')}}">
          <i class="bi bi-grid"></i>
          <span> Complaints Report</span>
        </a>


      </li><!-- End Dashboard Nav -->


    




 






    </ul>
      
     <!-- End Tables Nav -->
 <!-- End Charts Nav -->
 <!-- End Icons Nav -->

     
 <!-- End Contact Page Nav -->

    

  </aside><!-- End Sidebar-->

  <main id="main" class="main">



    <main class="py-4">
        @yield('content')
    </main>
   

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
   <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
 
  <script src="{{url('admin')}}/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="{{url('admin')}}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{url('admin')}}/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="{{url('admin')}}/assets/vendor/echarts/echarts.min.js"></script>
  <script src="{{url('admin')}}/assets/vendor/quill/quill.min.js"></script>
  <script src="{{url('admin')}}/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="{{url('admin')}}/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="{{url('admin')}}/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="{{url('admin')}}/assets/js/main.js"></script>

</body>

</html>