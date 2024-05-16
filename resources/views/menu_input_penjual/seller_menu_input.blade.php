
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <style>

        .font-style {
            margin: 0;
            font-family: Arial, sans-serif;
            font-weight: bold;
            color: black;
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


    <form action="/post" method='POST' enctype="multipart/form-data">
    @csrf

    <h1> Kategori</h1>  
    <select name="nama_kategori" class="form-control">
    @foreach($Kategori_admin as $value)
         <option value="{{ $value }}">{{ $value }}</option>
     @endforeach
    </select>
    <h1> Nama</h1>  
    <input type="text" name="nama" placeholder="Nama">
    <h1> Harga </h1> 
    <input type="text" name="harga" placeholder="Harga">
    <h1> Deskirpsi </h1> 
    <input type="text" name="deskripsi" placeholder="Deskripsi"> <br>
    <br>
    
    <div class="form-group">
        <label for="exampleFormControlFile1">Gambar menu</label>
        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="gambar">
    </div>

    <br>

    <button type="submit" class="btn btn-success">Submit</button>
    <a href="/seller/menu" button type="button" class="btn btn-danger">Cancel</button>
    


</body>
</html>




