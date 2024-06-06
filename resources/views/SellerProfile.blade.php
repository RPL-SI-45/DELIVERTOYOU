<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Biryani' rel='stylesheet'>
    <title>DeliverToYou</title>
    <style>
        body {
            margin: 0;
            font-family: 'Biryani', sans-serif;
            font-size: 14px;
        }

        .navbar {
            overflow: hidden;
            background-color: #B49852;
        }

        .navbar-logo img {
            height: 40px;
            margin-top: 10px;
            margin-right: 15px;
        }

        .search-container {
            display: inline-block;
            position: absolute;
            left: 45%;
            top: 0;
            transform: translateX(-45%);
        }

        .search-container input[type=text] {
            padding: 5px;
            margin-top: 16px;
            font-size: 10px;
            border: none;
            border-radius: 5px;
            width: 130px;
        }

        .search-container button {
            padding: 5px;
            margin-top: 16px;
            margin-left: 3px;
            background: #ddd;
            font-size: 9.5px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .search-container button:hover {
            background: #ccc;
        }

        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh;
            background-color: #f7f7f7;
            padding: 20px;
        }

        form {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 350px;
            display: flex;
            flex-direction: column;
            max-height: 100%;
            overflow-y: auto;
        }

        form input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        form button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        form button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="#" class="navbar-logo"><img src="img_example/logo.png" alt="logo"></a>
            <div class="search-container">
                <input type="text" placeholder="Search...">
                <button type="submit">Search</button>
            </div>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="home">HOME</a></li>
                <li><a href="menu">MENU</a></li>
                <li><a href="/profil">PROFIL</a></li>
                <li><a href="login">LOGIN</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="form-container">
    <form action="/seller/{{ $user->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="text" id="name" name="name" placeholder="Name" value="{{ $user->name }}">
        <input type="email" id="email" name="email" placeholder="Email Address" value="{{ $user->email }}">
        <input type="text" id="alamat" name="alamat" placeholder="Alamat" value="{{ $user->alamat }}">
        <input type="text" id="telefon" name="nomor_telepon" placeholder="No Telephone" value="{{ $user->nomor_telepon }}">
        <input type="text" id="nama_toko" name="nama_toko" placeholder="Nama Toko" value="{{ $user->nama_toko }}">
        <input type="text" id="alamat_toko" name="alamat_toko" placeholder="Alamat Toko" value="{{ $user->alamat_toko }}">
        <input type="file" id="qrcode" name="qrcode">
        <button type="submit">Update Profile</button>
    </form>
</div>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>


<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="form-container">
        <form action="/seller/{{ $user->id }}" method="POST">
            @csrf
            @method('PUT')
            <input type="text" id="name" name="name" placeholder="Name" value="{{ $user->name }}">
            <input type="email" id="email" name="email" placeholder="Email Address" value="{{ $user->email }}">
            <input type="text" id="alamat" name="alamat" placeholder="Alamat" value="{{ $user->alamat }}">
            <input type="text" id="telefon" name="nomor_telepon" placeholder="No Telephone" value="{{ $user->nomor_telepon }}">
            <input type="text" id="nama_toko" name="nama_toko" placeholder="Nama Toko">
            <input type="text" id="alamat_toko" name="alamat_toko" placeholder="Alamat Toko">
            <button type="submit">Update Profile</button>
        </form>
    </div>
</body>
</html>

 -->