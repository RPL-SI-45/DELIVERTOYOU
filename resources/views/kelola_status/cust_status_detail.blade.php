<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Biryani' rel='stylesheet'>
    <style>
        body {
      font-family: Arial, sans-serif;

    }
    .card-container {
        display: flex;
        flex-wrap: wrap;
    }

    .custom-card {
        flex: 0 0 calc(50% - 10px); /* Mengatur lebar kartu menjadi 50% dari lebar parent dengan sedikit margin */
        margin: 5px; /* Memberikan sedikit margin antara kartu */
    }

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

    .table-container {
      display: flex;
      border: 1px solid #dee2e6;
    }
    .table-column {
      display: flex;
      flex-direction: column;
      border-right: 1px solid #dee2e6;
      padding: 10px;
    }
    .table-column:last-child {
      border-right: none;
    }
    .table-cell {
      display: flex;
      align-items: center;
      padding: 8px;
      border-bottom: 1px solid #dee2e6;
    }
    .table-cell:last-child {
      border-bottom: none;
    }
    .table-cell img {
      max-width: 50px;
      height: auto;
      margin-right: 10px;
    }

    .custom-img-size {
      width: 100px;
      height: auto; 
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
            <a href="#" class="navbar-logo"><img src="{{ asset('img_example/logo.png') }}" alt="logo"></a>
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


<div class="container mt-5">
    <div class="table-container">
        <div class="table-column">
        <img src="{{ asset('img_example/makanan.png') }}" alt="Image 3" class="custom-img-size">
        <div class="table-cell font-weight-bold">CRISBAR</div>
        <div class="table-cell">ID : {{ $pemesanan->id }}</div>
        <div class="table-cell">Status : {{ $pemesanan->status_pemesanan }}</div>
        <div class="table-cell">Alamat : {{ $pemesanan->alamat }}</div>
        <div class="table-cell">Menu   : {{ $Pemesananitem->menu_id }}</div>
        <div class="table-cell">Harga   : {{ $Pemesananitem->harga }}</div>
        <div class="table-cell">Quantity   : {{ $Pemesananitem->quantity }}</div>
        <div class="table-cell">Total  : {{ $Pemesananitem->total_harga }}</div>
        <br>

        <a href="/seller/status" a type="button" class="btn btn-dark">Back</a>   
        </div>
    </div>
</div>


</body>
</html>