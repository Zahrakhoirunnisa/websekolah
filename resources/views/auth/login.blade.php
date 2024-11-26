<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{{ asset('assets/icons/logok4.ico') }}">
    <title>Login - SMK Negeri 4 Bogor</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
    
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), 
                             url('assets/images/upacaraa.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 2.5rem;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 450px;
            transform: translateY(0);
            transition: all 0.3s ease;
        }

        .login-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.25);
        }

        .logo-container {
            text-align: center;
            margin-bottom: 2rem;
        }

        .logo-container img {
            height: 80px;
            margin-bottom: 1rem;
        }

        .input-group {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .input-group i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #4C6EF5;
        }

        .custom-input {
            width: 100%;
            padding: 12px 20px 12px 45px;
            border: 2px solid #E2E8F0;
            border-radius: 12px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.9);
        }

        .custom-input:focus {
            border-color: #4C6EF5;
            box-shadow: 0 0 0 3px rgba(76, 110, 245, 0.1);
            outline: none;
        }

        .custom-input::placeholder {
            color: #A0AEC0;
        }

        .custom-button {
            background: linear-gradient(45deg, #4C6EF5, #3B82F6);
            color: white;
            padding: 12px 24px;
            border-radius: 12px;
            width: 100%;
            font-size: 1rem;
            font-weight: 500;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .custom-button:hover {
            background: linear-gradient(45deg, #3B82F6, #2563EB);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(59, 130, 246, 0.3);
        }

        .error-message {
            background: linear-gradient(45deg, #FEE2E2, #FEF2F2);
            border: 1px solid #FCA5A5;
            color: #EF4444;
            padding: 1rem;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
        }

        .text-link {
            color: #4C6EF5;
            text-decoration: none;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .text-link:hover {
            color: #3B82F6;
            text-decoration: underline;
        }

        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 1.5rem 0;
            color: #A0AEC0;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #E2E8F0;
        }

        .divider span {
            padding: 0 1rem;
            font-size: 0.9rem;
        }

        @media (max-width: 640px) {
            .login-container {
                margin: 1rem;
                padding: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <div class="login-container">
        <!-- Logo & Title -->
        <div class="logo-container">
            <img src="{{ asset('assets/icons/logok4.ico') }}" alt="Logo" class="mx-auto">
            <h2 class="text-2xl font-bold text-gray-800 mb-2">Selamat Datang</h2>
            <p class="text-gray-600 text-sm">Silakan login untuk melanjutkan</p>
        </div>

        <!-- Login Form -->
        <form method="post" action="{{ route('login.action') }}">
            @csrf
            
            <!-- Error Messages -->
            @if ($errors->any())
            <div class="error-message" role="alert">
                <div class="flex items-center mb-2">
                    <i class="fas fa-exclamation-circle mr-2"></i>
                    <strong class="font-semibold">Terjadi kesalahan!</strong>
                </div>
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <!-- Username Input -->
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" 
                       name="username" 
                       id="username" 
                       class="custom-input" 
                       placeholder="Masukkan username"
                       required>
            </div>

            <!-- Password Input -->
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" 
                       name="password" 
                       id="password" 
                       class="custom-input" 
                       placeholder="Masukkan password"
                       required>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="custom-button">
                <i class="fas fa-sign-in-alt mr-2"></i>
                Masuk
            </button>

            <!-- Divider -->
            <div class="divider">
                <span>atau</span>
            </div>

            <!-- Additional Links -->
            <div class="text-center">
                <a href="#" class="text-link">
                    <i class="fas fa-key mr-1"></i>
                    Lupa password?
                </a>
            </div>
        </form>

        <!-- Footer -->
        <div class="text-center mt-6">
            <p class="text-gray-600 text-sm">
                © 2024 SMK Negeri 4 Bogor. All rights reserved.
            </p>
        </div>
    </div>
</body>

</html>
