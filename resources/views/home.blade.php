<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Biryani' rel='stylesheet'>
    <title>DeliverToYou</title>
    <style>
        body {
            margin: 0;
            font-family: Biryani; size: 14px;
        }

        .navbar {
            overflow: hidden;
            background-color: #B49852;
        }

        .navbar-logo img{
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

        .content-container {
            position: relative;
            display: inline-block;
        }

        .content-text {
            position: absolute;
            bottom: 0;
            left: 150px;
            background-color: white;
            padding: 10px;
            text-align: center;
        }

        .about {
            margin: 0;
        }

        .card-container {
            display: flex;
            flex-direction: row;
            justify-content: center;
            margin-top: 20px;
            flex-wrap: wrap;
            align-items: center;
        }

        .content-img {
            max-width: 100%;
            height: auto;
            display: block;
            margin-top: -50px; 
            z-index: -1;
        }

        .button-pesan {
            background-color: #E1AB24;
            border-radius: 7px;
        }

        .card .card-img-top {
            height: 50px; 
            object-fit: contain; 
        }

        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
            width: 15rem;
            margin: 7px;
            padding: 20px;
            text-align: center;
            background-color: #E7E4DC;

        }

        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        }

        .card-text {
            margin-top: 10px;
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
                <li><a href="categories">CATEGORIES</a></li>
                <li><a href="about">ABOUT</a></li>
                <li><a href="login">LOGIN</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="content-container">
    <img src="img_example/makanan.jpeg" class="content-img" alt="Content Image">
    <div class="content-text">
        <p class="about">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi facilisis sapien non tristique pharetra.</p></br>
            <button type="button" class="button-pesan">PESAN</button>
    </div>
</div>

@foreach($menuwarungs as $t)
<div class="card-container">
    <div class="card">
        <a href="/customer/menu"><img src="img_example/makanan.jpeg" class="card-img-top"></a>
        <div class="card-body">
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi facilisis sapien non tristique pharetra.</p>
        </div>
    </div>
</div>
@endforeach

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>