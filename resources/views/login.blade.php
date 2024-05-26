<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>PasarAja</title>
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{asset ('admin_asset/template/images/Logo3.png')}}" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('boot/css/styles.css') }}" rel="stylesheet" />
    <link href="{{ asset('boot/css/login.css') }}" rel="stylesheet" />
</head>
<style>
    .form-outline {
        position: relative;
    }
    .form-outline input[type="password"],
    .form-outline input[type="text"] {
        padding-right: 2.5rem; /* Adjust space for the icon */
    }
    .form-outline .fa-eye, 
    .form-outline .fa-eye-slash {
        position: absolute;
        top: 50%;
        right: 2rem;
        transform: translateY(-50%);
        cursor: pointer;
    }
</style>
<body>
    <section class="vh-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 text-black">
                    <div class="text-center">
                        <h2 class="text-judul">Welcome To PasarAja</h2>
                        <p class="text-1">Masukan email dan password untuk login</p>
                    </div>
                    @if (@session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

                        <form style="width: 23rem;" action="{{ route('loginauth') }}" method="POST">
                            @csrf
                            <h3 class="fw-normal mb-3 pb-3" id="text-log">Log in</h3>
                        
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form2Example18">Email</label>
                                <input type="email" name="email" id="form2Example18" class="form-control form-control-lg" />
                            </div>
                        
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form2Example28">Password</label>
                                <div class="input-group">
                                    <input type="password" name="password" id="form2Example28" class="form-control form-control-lg" />
                                    <button type="button" id="togglePassword" class="btn btn-outline-secondary">
                                        <i class="fas fa-eye" id="togglePasswordIcon"></i>
                                    </button>
                                </div>
                            </div>
                        
                            <script>
                                const togglePassword = document.getElementById('togglePassword');
                                const passwordField = document.getElementById('form2Example28');
                                const togglePasswordIcon = document.getElementById('togglePasswordIcon');
                        
                                togglePassword.addEventListener('click', function () {
                                    // Toggle the type attribute
                                    const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
                                    passwordField.setAttribute('type', type);
                        
                                    // Toggle the icon
                                    togglePasswordIcon.classList.toggle('fa-eye');
                                    togglePasswordIcon.classList.toggle('fa-eye-slash');
                                });
                            </script>
                        
                            <div class="pt-1 mb-4">
                                <button class="btn btn-info btn-lg btn-block" id="btn-detail" type="submit">Login</button>
                            </div>
                        </form>
                        

                    </div>

                </div>
                <div class="col-sm-6 px-0 d-none d-sm-block">
                    <img src="{{ asset('img/login1.png') }}" alt="Login image" class="w-100 vh-100"
                        style="object-fit: cover; object-position: left;">
                </div>
            </div>
        </div>
    </section>
</body>

</html>
