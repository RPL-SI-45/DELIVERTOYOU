<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dasboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Biryani' rel='stylesheet'>
    


    <style>
    .body {
      font-family: Arial, sans-serif;

    }
    .card-container {
        display: flex;
        flex-wrap: wrap;
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
                <li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">LOGOUT</a>
                </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="jumbotron text-center">
            <p class="lead">Peforma penjualan anda dalam rentang waktu 1 bulan.</p>
            <hr class="my-4">
            </div>
        </div>
    </div>


    <div style="text-align: center;">
    <a href="/seller/dash/1_month" type="button" class="btn btn-dark" style="display: inline-block; margin-right: 10px;">1 bulan yang lalu</a>
    <a href="/seller/dash" type="button" class="btn btn-dark" style="display: inline-block;">Total Waktu</a>
    </div>

    @foreach($SellerDash2 as $t)
                <div class="container mt-5">
                 <div class="table-container">
                  <div class="table-column">
                    <img src="{{ asset('img_example/makanan.png') }}" alt="Image 3" class="custom-img-size">
                    <div class="table-cell font-weight-bold">Total Pemesanan : {{$t->Total_pemesanan2}}</div>
                    <div class="table-cell font-weight-bold">Total Pendapatan : {{$t->Total_harga2}}</div>
                   </div>
                  </div> 
                </div>

                @endforeach
                  
      
</body>
</html>