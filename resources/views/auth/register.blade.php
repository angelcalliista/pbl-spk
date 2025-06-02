<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Registrasi Akun - SahabatPNJ</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/ico-pnj.jpg') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --brand-blue: rgb(8, 112, 223);
            --brand-blue-darker: rgb(6, 90, 180);
            --text-dark: #333;
            --text-muted: #6c757d;
            --light-bg: #f8f9fa;
        }
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }
        .register-container-wrapper {
            display: flex;
            min-height: 100vh;
        }
        .illustration-column {
            background-color: var(--brand-blue);
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 3rem;
            text-align: center;
            animation: slideInLeft 0.8s ease-out;
        }
        .illustration-column .brand-logo-large {
            width: 120px;
            margin-bottom: 1.5rem;
        }
        .illustration-column h1 {
            font-weight: 600;
            font-size: 2.2rem;
            margin-bottom: 1rem;
        }
        .illustration-column p {
            font-size: 1.1rem;
            max-width: 450px;
            line-height: 1.6;
            opacity: 0.9;
            margin-bottom: 2rem;
        }

        .illustration-column .hero-illustration {
            max-width: 80%;
            height: auto;
            max-height: 300px;
        }
        .form-column {
            background-color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem;
            animation: fadeInRight 0.8s ease-out 0.2s;
            animation-fill-mode: both;
        }
        .register-form-container {
            width: 100%;
            max-width: 420px;
            padding: 2.5rem;
            background-color: #fff;
            border-radius: 12px;
        }

        .form-column .form-logo-small {
            display: block;
            width: 70px;
            margin: 0 auto 1.5rem auto;
        }

        .form-column .register-title {
            font-size: 1.8rem;
            font-weight: 600;
            color: var(--text-dark);
            text-align: center;
            margin-bottom: 0.5rem;
        }
        .form-column .register-subtitle {
            font-size: 0.95rem;
            color: var(--text-muted);
            text-align: center;
            margin-bottom: 2rem;
        }

        .form-control {
            border-radius: 8px;
            padding: 0.85rem 1.1rem;
            border: 1px solid #e0e0e0;
            transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
            background-color: #fdfdfd;
        }

        .form-control:focus {
            border-color: var(--brand-blue);
            box-shadow: 0 0 0 0.2rem rgba(8, 112, 223, 0.25);
            background-color: #fff;
        }

        .input-group .form-control { border-right: 0; }
        .input-group .input-group-text {
            background-color: #fdfdfd;
            border-left: 0;
            border-color: #e0e0e0;
            cursor: pointer;
            border-radius: 0 8px 8px 0;
        }
        .input-group .form-control:focus + .input-group-text {
            border-color: var(--brand-blue);
            box-shadow: 0 0 0 0.2rem rgba(8, 112, 223, 0.25) inset;
        }
         .input-group .form-control:not(:focus) + .input-group-text {
            border-color: #e0e0e0;
        }
        .input-group-text i { color: var(--text-muted); }
        .btn-register {
            background-color: var(--brand-blue);
            border-color: var(--brand-blue);
            padding: 0.75rem;
            font-weight: 600;
            border-radius: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: background-color 0.2s ease, transform 0.2s ease;
        }

        .btn-register:hover {
            background-color: var(--brand-blue-darker);
            border-color: var(--brand-blue-darker);
            transform: translateY(-2px);
        }

        .login-link-container {
            text-align: center;
            margin-top: 1.5rem;
            font-size: 0.9rem;
        }
        .login-link-container a {
            color: var(--brand-blue);
            font-weight: 500;
            text-decoration: none;
        }
        .login-link-container a:hover {
            text-decoration: underline;
        }

        .alert ul { padding-left: 1.25rem; }
        @keyframes slideInLeft {
            from { transform: translateX(-100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        @keyframes fadeInRight {
            from { transform: translateX(50px); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        @media (max-width: 991.98px) {
            .illustration-column {
                display: none;
            }
            .form-column {
                background-color: #f0f4f8;
                padding: 1rem;
            }
            .register-form-container {
                padding: 1.5rem;
                box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            }
        }
    </style>
</head>
<body>

<div class="container-fluid p-0 register-container-wrapper">
    <div class="row g-0 w-100">
        <div class="col-lg-7 illustration-column">
            <a href="{{ route('welcome') }}">
                <img src="{{ asset('assets/images/logo-spnj.png') }}" alt="SahabatPNJ Logo" class="brand-logo-large">
            </a>
            <h1>Buat Akun SahabatPNJ</h1>
            <p>Daftar sekarang dan jadilah bagian dari proses pemilihan pemimpin yang transparan dan cerdas di Politeknik Negeri Jakarta.</p>

        </div>
        <div class="col-lg-5 col-md-12 form-column">
            <div class="register-form-container">
                <h3 class="register-title">Buat Akun Baru</h3>
                <p class="register-subtitle">Isi data diri Anda untuk mendaftar.</p>

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form method="POST" action="{{ url('register') }}">
                    @csrf
                    <div class="mb-3">
                        <input type="hidden" name="id_role" value="1" required autofocus />
                    </div>
                    <div class="mb-3">
                        <input type="text" name="name" class="form-control" placeholder="Nama Lengkap" required autofocus />
                    </div>
                    <div class="mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Alamat Email" required />
                    </div>
                    <div class="mb-3 input-group">
                        <input type="password" name="password" id="passwordInput" class="form-control" placeholder="Password" required />
                        <span class="input-group-text" onclick="togglePasswordVisibility('passwordInput', 'toggleIcon')">
                            <i class="bi bi-eye-slash-fill" id="toggleIcon"></i>
                        </span>
                    </div>

                    <div class="mb-4 input-group">
                        <input type="password" name="password_confirmation" id="passwordConfirmationInput" class="form-control" placeholder="Konfirmasi Password" required />
                        <span class="input-group-text" onclick="togglePasswordVisibility('passwordConfirmationInput', 'toggleIconConfirm')">
                            <i class="bi bi-eye-slash-fill" id="toggleIconConfirm"></i>
                        </span>
                    </div>

                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-primary btn-register">Register</button>
                        <div class="login-link-container">
                            Sudah punya akun? <a href="{{ url('login') }}">Login</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function togglePasswordVisibility(inputId, iconId) {
        const passwordInput = document.getElementById(inputId);
        const toggleIcon = document.getElementById(iconId);

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            toggleIcon.classList.remove("bi-eye-slash-fill");
            toggleIcon.classList.add("bi-eye-fill");
        } else {
            passwordInput.type = "password";
            toggleIcon.classList.remove("bi-eye-fill");
            toggleIcon.classList.add("bi-eye-slash-fill");
        }
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
