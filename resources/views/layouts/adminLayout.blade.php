<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ URL::asset('css/violation.css') }}" rel="stylesheet">
    
    <!-- Font Awesome Icon -->
    <link href="{{ URL::asset('font-awesome/font-awesome.css') }}" rel="stylesheet">

    <!-- datepicker style CSS -->
    <link href="{{ URL::asset('jquery-ui/jquery-ui.min.css') }}" rel="stylesheet">
  </head>

  <body class="">

    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
      <header class="masthead mb-auto">
        <div class="inner">
          <h3 class="masthead-brand">Evis</h3>
          <nav class="nav nav-masthead justify-content-center">
            <a class="{{ Request::is('admin-dashboard') ? 'nav-link active' : 'nav-link' }}" href="{{ route('admin.dashboard') }}">Beranda</a>
            <li class="nav-item dropdown">
              <a class="{{ Request::is('admin-dashboard/violation') ? 'nav-link active' : 'nav-link' }}" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Pelanggaran</a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('violation.index') }}">Daftar Pelanggaran</a>
                <a class="dropdown-item" href="{{ route('employee.violation.index') }}">Pelanggaran Pegawai</a>
              </div>
            </li>
            <a class="{{ Request::is('admin-dashboard/employee-sanction') ? 'nav-link active' : 'nav-link' }}" href="{{ route('employee.sanction.index') }}">Sanksi</a>
            <a class="{{ Request::is('admin-dashboard/employee-layoffs') ? 'nav-link active' : 'nav-link' }}" href="{{ route('employee.layoffs.index') }}" >PHK</a>
            <a class="{{ Request::is('logout') ? 'nav-link active' : 'nav-link' }}" href="{{ route('logout') }}">Keluar</a>
          </nav>
        </div>
      </header>

      <main role="main" class="inner cover">
        @yield('content')
      </main>

      <footer class="mastfoot mt-auto">
      <center>
        <div class="inner">
          <p>Employee Violation Information System &copy; All rights reserved</p>
        </div>
      </center>
      </footer>
    </div>   

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    @yield('script')
  </body>
</html>