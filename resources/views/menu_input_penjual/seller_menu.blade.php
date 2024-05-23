
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Biryani' rel='stylesheet'>

    <style>
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

    .delete-button {
        background-color: #dc3545;  
        color: #fff; 
        border: none; 
        padding: 8px 16px; 
        border-radius: 4px; 
        cursor: pointer; 
    }

    .delete-button:hover {
        background-color: #c82333;
    }


    .action-button {
    padding: 10px 20px; 
    margin: 5px;
    font-size: 16px; 
    border-radius: 5px; 
    }

    .btn-primary {
    background-color: #007bff; 
    border: none; 
    cursor: pointer; 
    }

    .btn-primary:hover {
    background-color: #0056b3; 
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

@foreach($menu_warungs as $t)
<div class="card-container">
    <div class="custom-card">
        <div class="card card-style" style="background-color: #B49852; border: 1px solid gray; padding: 10px; margin: 10px; border-radius: 5px;">
            <img class="card-img-top" src="{{ asset('gambar_menu/'.$t->gambar) }}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{$t->nama}} </h5>
                <p class="card-text">Kategori : {{$t->kategori}} <br> Harga Rp.{{$t->harga}} <br> Deskripsi :{{$t->deskripsi}}</p>
                <a href="/seller/{{$t->id}}/menu/edit" class="btn btn-dark action-button">Ubah data menu kamu</a>
                <form action="/menu/{{$t->id}}" method="post" style="display: inline;"></form>
                <button type="submit" class="btn btn-primary action-button" style="background-color: black; color: white; border: none; padding: 10px 20px; border-radius: 5px;" value="delete">Delete</button>
            
                

    
            </div>
        </div>
    </div>
</div>
@endforeach

<a href="/seller/menu/input"> <!-- Perhatikan penambahan / di depan rute -->
<div class="text-center">
    <button class="btn btn-primary" type="button">Tambah Menu Baru</button>
</div>
</a>

</body>
</html>



