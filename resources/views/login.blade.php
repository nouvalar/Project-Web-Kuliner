<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BoCCo - Login</title>
    <link href="{{ asset('/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="{{ asset('/assets/css/main.css') }}" rel="stylesheet">
    <!-- buat font poppins-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap">
</head>

<body>
    <div class="bg">
        <div class="card bg-white">
            <div class="card-header text-center">
                <h3 style="font-family: 'Poppins', sans-serif;">Login</h3>
            </div>
            <div class="card-body">
                <div id="loginForm">
                    @if (Session::has('pesan'))
                        <script>
                            Swal.fire('Berhasil Register, Silahkan login!');
                        </script>
                    @endif
                    <!-- Form Login -->
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" value="{{ old('email') }}" name="email"
                                class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="mb-3 field button-field">
                            <button name="submit" type="submit" class="btn btn-colour btn-long">Login</button>
                        </div>
                        <div class="form-link">
                            <span>Don't have an account? <a href="{{ route('register') }}" class="link signup-link" style="color: #0171D3;">Signup</a></span>
                        </div>
                    
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var loginForm = document.getElementById('loginForm');
            var registerForm = document.getElementById('registerForm');

            if (loginForm && registerForm) {
                loginForm.style.display = 'block';
                registerForm.style.display = 'none';
            }
        });

        var showRegisterButton = document.getElementById('showRegister');
        if (showRegisterButton) {
            showRegisterButton.addEventListener('click', function(event) {
                event.preventDefault();
                var loginForm = document.getElementById('loginForm');
                var registerForm = document.getElementById('registerForm');
                if (loginForm && registerForm) {
                    loginForm.style.display = 'none';
                    registerForm.style.display = 'block';
                }
            });
        }

        var showLoginButton = document.getElementById('showLogin');
        if (showLoginButton) {
            showLoginButton.addEventListener('click', function(event) {
                event.preventDefault();
                var loginForm = document.getElementById('loginForm');
                var registerForm = document.getElementById('registerForm');
                if (loginForm && registerForm) {
                    loginForm.style.display = 'block';
                    registerForm.style.display = 'none';
                }
            });
        }
    </script>

    @if (Session::has('failed'))
        <script>
            Swal.fire('Username dan password yang dimasukkan tidak sesuai');
        </script>
    @endif

    @if (Session::has('success'))
        <script>
            Swal.fire("Anda telah berhasil logout.");
        </script>
    @endif
</body>

</html>
