<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>DeliverToYou</title>
    <style>
        body {
            margin: 0;
            font-family: Verdana, sans-serif;
        }

        .navbar {
            overflow: hidden;
            background-color: #B49852;
        }

        .navbar-logo {
            float: left;
            height: 10px;
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

        .content-img {
            max-width: 100%;
            height: auto;
            display: block;
            margin-top: -50px; 
            z-index: -1;
        }

        .card .card-img-top {
        height: 200px; 
        object-fit: cover; 
        
        }

        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
            width: 300px;
            margin: 20px;
            padding: 50px;
            text-align: center;
            float: left;
            background-color: #E7E4DC;
        }

        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        }

    </style>
</head>
<body>

<div class="navbar navbar-inverse navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="#" class="navbar-logo"><img src="" alt="logo"></a>
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

    <div>
        <img src="img_example/5.jpeg" class="content-img" alt="Content Image">
    </div>
    
    <div class="card">
        <img src="img_example/1.jpeg" class="card-img-top">
        <div>
            <h2>Card Title</h2>
            <p>This is a simple card component.</p>
        </div>
    </div>
    
    <div class="card">
        <img src="img_example/1.jpeg" class="card-img-top">
        <div>
            <h2>Card 2</h2>
            <p>This is the content of Card 2.</p>
        </div>
    </div>

    <div class="card">
        <img src="img_example/3.jpeg" class="card-img-top">
        <div>
            <h2>Card 3</h2>
            <p>This is the content of Card 3.</p>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>