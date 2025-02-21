<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List App</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Google Fonts (Poppins) -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Custom Styles */
        body {
            background: linear-gradient(135deg, #0077b6, #023e8a, #48cae4);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Poppins', sans-serif;
            color: #fff;
        }
        .landing-container {
            max-width: 500px;
            padding: 40px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
            text-align: center;
            transform: scale(0.95);
            transition: transform 0.3s ease-in-out;
        }
        .landing-container:hover {
            transform: scale(1);
        }
        h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            color: #333;
        }
        p {
            font-size: 1.1rem;
            color: #555;
            margin-bottom: 30px;
        }
        .btn {
            margin: 10px;
            padding: 12px 30px;
            font-size: 1rem;
            font-weight: 600;
            border-radius: 30px;
            transition: all 0.3s ease;
        }
        .btn-primary {
            background-color: #0077b6;
            border: none;
        }
        .btn-primary:hover {
            background-color: #023e8a;
        }
        .btn-secondary {
            background-color: #48cae4;
            border: none;
        }
        .btn-secondary:hover {
            background-color: #00b4d8;
        }
        .icon {
            font-size: 4rem;
            color: #0077b6;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="landing-container">
        <!-- Icon -->
        <i class="fas fa-check-circle icon"></i>
        <!-- Title -->
        <h1>Selamat Datang di To-Do List App</h1>
        <!-- Description -->
        <p>Kelola tugas harian Anda dengan mudah dan efisien.</p>
        <!-- Buttons -->
        <a href="{{ route('register') }}" class="btn btn-primary">Daftar Sekarang</a>
        <a href="{{ route('login') }}" class="btn btn-secondary">Login</a>
    </div>
</body>
</html>