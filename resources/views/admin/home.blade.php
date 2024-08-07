<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title', 'BC | Bogor Culinary')</title>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Bootstrap core CSS-->
    <link href="{{ asset('/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="{{ asset('/assets/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="{{ asset('/assets/css/style.css') }}" rel="stylesheet">
    <!-- buat font poppins-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap">


    <script
        src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous"></script>

        <style>
            .navbar {
                background-color: #1760A5 !important;
            }
            
            body.fixed-nav {
                padding-top: 56px;
                font-family: 'Poppins', sans-serif;
            }
        
            .navbar-nav {
                width: 100%;
                display: flex;
                justify-content: right;
                font-family: 'Poppins', sans-serif;
            }

            .navbar-nav .sidenav-toggler {
                display: none;
            }

            .content-wrapper {
                margin-left: 0; 
            }

    
        </style>

</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
        <a class="navbar-brand text-light" href="#"><strong>Bogor Culinary - Admin Page</strong></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav mx-2" id="exampleAccordion">
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="admin">
                    <a class="nav-link" href="{{ route('admin') }}">
                        <i class="fa fa-fw fa-user"></i>
                        <span class="nav-link-text text-light">Admin</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                        <i class="fa fa-fw fa-sign-out"></i>Logout
                    </a>
                </li>
            </ul>
        </div>
        
    </nav>
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="content">
                <h1>@yield('page-title', 'Dashboard')</h1>
                @yield('content')
            </div>
        </div>
        <!-- Logout Modal-->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ingin Keluar?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Tekan Logout untuk keluar dari akun.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="/logout">Logout</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fa fa-angle-up"></i>
        </a>
        <!-- Bootstrap core JavaScript-->
        <script src="{{ asset('/assets/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- Core plugin JavaScript-->
        <script src="{{ asset('/assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
        <!-- Custom scripts for all pages-->
        <script src="{{ asset('/assets/js/sb-admin.min.js') }}"></script>
    </div>

    <script>
        document.getElementById('logoutBtn').addEventListener('click', function() {
            $('#exampleModal').modal('show');
        });

        function toggleDropdown() {
            var dropdownMenu = document.querySelector('.dropdown-menu');
            var dropdownToggle = document.querySelector('.dropdown-toggle');
            var icon = dropdownToggle.querySelector('i'); 
            dropdownMenu.classList.toggle('show');
            dropdownToggle.classList.toggle('active');
            icon.classList.toggle('rotate'); 
        }
    </script>

    @include('footer')

</body>

</html>
