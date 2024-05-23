<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
            background: url('/img_example/landing.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #333;
        }

        header {
            background: rgba(0, 0, 0, 0.7);
            padding: 15px 0;
            color: white;
        }

        .container {
            width: 80%;
            margin: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            
        }

        .logo {
            font-size: 28px;
            font-weight: bold;
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            gap: 20px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s;
        }

        nav ul li a:hover {
            color: #ff9900;
        }

        .logo-image {
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 50px;
            height: 50px;
            margin-right: 20px;
        }

        main {
            text-align: center;
            padding: 150px 20px;
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            border-radius: 10px;
            max-width: 800px;
            margin: auto;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .landing-page h1 {
            font-size: 56px;
            margin-bottom: 20px;
            color: #663300;
        }

        .landing-page p {
            font-size: 18px;
            max-width: 700px;
            margin: 20px auto;
            line-height: 1.6;
            color: #333;
        }

        .buttons {
            margin: 30px 0;
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .buttons a {
            padding: 15px 30px;
            font-size: 16px;
            font-weight: bold;
            margin: 5px;
            border: none;
            border-radius: 25px;
            text-decoration: none;
            display: inline-block;
            transition: transform 0.2s, background-color 0.2s;
        }

        .buttons .signup {
            background-color: #ff9900;
            color: white;
        }

        .buttons .signup:hover {
            background-color: #cc7a00;
            transform: scale(1.05);
        }

        .buttons .login {
            background-color: #663300;
            color: white;
        }

        .buttons .login:hover {
            background-color: #4d2600;
            transform: scale(1.05);
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .logo-image {
                position: static;
                transform: none;
                margin: 10px 0;
            }

            .landing-page h1 {
                font-size: 40px;
            }

            .buttons {
                flex-direction: column;
                gap: 10px;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">DeliveryToYou</div>
            <img src="img_example/logo.png" alt="Logo" class="logo-image">
        </div>
    </header>
    <main>
        <div class="landing-page">
            <h1>DeliveryToYou</h1>
            <p>Selamat datang di DeliveryToYou, solusi inovatif untuk pemesanan makanan online di sekitar Telkom University! Kami memahami tantangan yang dihadapi warung makanan dalam mengelola pengiriman dan biaya layanan yang tinggi saat menggunakan aplikasi pihak ketiga. Oleh karena itu, kami hadir untuk menawarkan platform yang memudahkan penjual dan pembeli berinteraksi secara langsung, tanpa biaya layanan yang memberatkan.</p>
            <div class="buttons">
                <a href="/register" class="signup">Register</a>
                <a href="/login" class="login">Login</a>
            </div>
        </div>
    </main>
</body>
</html>
