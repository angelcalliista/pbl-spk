<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Register Admin</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/ico-pnj.jpg') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background-color: rgb(8, 112, 223);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-box {
            background: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            width: 100%;
            max-width: 400px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
        }
        .login-box img {
            width: 80px;
            margin-bottom: 10px;
        }
        .password-container {
            position: relative;
        }
        .password-container input {
            padding-right: 40px;
        }
        .toggle-password {
            position: absolute;
            right: 10px;
            top: 65%;
            transform: translateY(-50%);
            cursor: pointer;
        }
        .toggle-password img {
            width: 25px;
            height: 25px;
        }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="login-box">
        <img src="{{ asset('gambar/logo.png') }}" alt="Logo" />
        <h3 class="mb-3">Register</h3>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ url('register') }}">
            @csrf
            <div class="mb-3">
                <input type="text" name="username" class="form-control" placeholder="Username" required autofocus />
            </div>
            <div class="mb-3">
                <input type="text" name="email" class="form-control" placeholder="Email" required autofocus />
            </div>
            <div class="mb-5 password-container">
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required />
                <span class="toggle-password" onclick="togglePassword()">
                    <img src="{{ asset('gambar/eye.svg') }}" id="eye-icon" alt="Show Password" />
                </span>
            </div>
            <button type="submit" class="btn btn-primary w-100">Register</button>
        </form>
        <a href="{{ url('login') }}">Sudah Login ?</a>
    </div>
</div>

<script>
    function togglePassword() {
        let passwordField = document.getElementById("password");
        let eyeIcon = document.getElementById("eye-icon");

        if (passwordField.type === "password") {
            passwordField.type = "text";
            eyeIcon.src = "{{ asset('gambar/eye-off.svg') }}";
        } else {
            passwordField.type = "password";
            eyeIcon.src = "{{ asset('gambar/eye.svg') }}";
        }
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
