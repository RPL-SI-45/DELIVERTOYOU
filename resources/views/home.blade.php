<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Biryani' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <title>DeliverToYou</title>
    <style>
        body {
            margin: 0;
            font-family: 'Biryani', sans-serif;
            font-size: 14px;
            background-color: #f5f5f5;
        }

        .navbar {
            background-color: #B49852;
            border: none;
            border-radius: 0;
        }

        .navbar-logo img {
            height: 40px;
            margin-top: 5px;
        }

        .navbar-text {
            color: #fff;
            margin-right: 15px;
            margin-top: 15px;
            font-size: 16px;
        }

        .search-container {
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        .search-container input[type="text"] {
            padding: 5px 10px;
            margin-top: 8px;
            font-size: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 200px;
        }

        .search-container button {
            padding: 5px 10px;
            margin-top: 8px;
            margin-left: 5px;
            background: #ddd;
            font-size: 12px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .search-container button:hover {
            background: #ccc;
        }

        .content-container {
            background-image: url('/img_example/makanan.png');
            position: relative;
            text-align: center;
            margin-bottom: 20px;
            height: 200px;
            margin-top: -25px;
            margin-left: -30px;
        }

        .content-text {
            width: 100%;
            height: auto;
            display: block;
        }

        .content-text {
            position: absolute;
            bottom: 25px;
            left: 50%;
            transform: translateX(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            padding: 10px;
            text-align: center;
            border-radius: 5px;
            margin-left: 20px;
            color: #ccc;
        }

        .about {
            margin: 0;
            font-weight: bold;
        }

        .button-pesan {
            background-color: #E1AB24;
            border: none;
            border-radius: 7px;
            padding: 10px 20px;
            color: #fff;
            cursor: pointer;
        }

        .button-pesan:hover {
            background-color: #d18a1a;
        }

        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            width: 100%;
        }

        .card {
            width: 300px; /* Anda dapat menyesuaikan lebar kartu sesuai kebutuhan */
            margin: 10px;
            border: 1px solid #ccc;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card-img-top {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }

        .card-text {
            padding: 15px;
            text-align: center;
        }

        .add-to-cart-btn {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 20px;
            font-size: 14px;
            color: #fff;
            background-color: #28a745;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .add-to-cart-btn:hover {
            background-color: #218838;
        }

        .card-text p {
            margin: 0;
            font-size: 16px;
        }

        .navbar-nav > li > a {
            color: #fff;
        }

        .navbar-nav > li > a:hover {
            color: #f1f1f1;
        }

        #notification {
            display: none;
            position: fixed;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            border-radius: 5px;
            z-index: 1000;
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
            <div>
            @if(auth()->check())
                <p class="navbar-text">
                    @if(auth()->user()->role == 'seller')
                        Halo Seller
                    @elseif(auth()->user()->role == 'customer')
                        Halo {{ auth()->user()->name }}
                    @endif
                @endif
            </div>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/order/status">STATUS</a></li>
                <li><a href="menu">MENU</a></li>
                <li><a href="profilee">PROFILE</a></li>
                <li><a href="categories">CATEGORIES</a></li>
                <li><a href="{{ route('cart.index') }}">KERANJANG</a></li>
                <li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">LOGOUT</a>
                </li>
            </ul>
            <div class="search-container">
                <input type="text" id="search-input" placeholder="Search...">
                <button type="button" id="search-button">Search</button>
            </div>
        </div>
    </div>
</div>

<div class="content-container">
    <div>
        <h1 class="content-text">Selamat Datang di DeliverToYou</h1>
    </div>
</div>
<div class="dropdownfilter">
    <h3> Filter </h3>
    <form action="{{ route('home.filter') }}" method="GET">
        <select name="nama_kategori" class="form-control" onchange="this.form.submit()">
            <option value="">Select Category</option>
            @foreach($Kategori_admin as $key => $value)
                <option value="{{ $value }}" {{ request()->nama_kategori == $key ? 'selected' : '' }}>{{ $value }}</option>
            @endforeach
        </select>
    </form>
</div>
<div class="card-container">
    @foreach($menu_warungs as $t)
    <div class="card">
        <a href="/customer/{{$t->seller_id}}/menu"><img src="{{ asset('gambar_menu/'.$t->gambar) }}" class="card-img-top" alt="{{ $t->nama }}"></a>
        <div class="card-text">
            <p>{{ $t->nama }}</p>
            <p>Rp. {{ $t->harga }}</p>
            <p>{{ $t->deskripsi}}</p>
            <form class="add-to-cart-form" data-id="{{ $t->id }}" action="{{ route('cart.add', $t->id) }}" method="POST">
                @csrf
                <button type="submit" class="add-to-cart-btn">Tambah Keranjang</button>
            </form>
        </div>
    </div>
    @endforeach
</div>
<div id="notification"></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        $('#search-button').on('click', function(e) {
            e.preventDefault();
            var query = $('#search-input').val().toLowerCase();
            $('.card-container .card').each(function() {
                var itemName = $(this).find('.card-img-top').attr('alt').toLowerCase();
                if (itemName.includes(query)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });

        var status = "{{ session('status') }}";
        if (status) {
            $('#notification').text(status).css('background-color', '#4CAF50').fadeIn().delay(2000).fadeOut();
        }
        $('.add-to-cart-btn').click(function(e) {
            e.preventDefault();
            var form = $(this).closest('form');
            var formData = form.serialize();
            var actionUrl = form.attr('action');

            $.ajax({
                type: 'POST',
                url: actionUrl,
                data: formData,
                success: function(response) {
                    console.log(response);  // Tambahkan console.log untuk debug
                    if (response.status === 'exists') {
                        $('#notification').text('Menu sudah ada').css('background-color', '#f44336').fadeIn().delay(2000).fadeOut();
                    } else if (response.status === 'added') {
                        $('#notification').text('Berhasil Ditambahkan').css('background-color', '#4CAF50').fadeIn().delay(2000).fadeOut();
                    }
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText); // Tambahkan console.log untuk error
                    alert('Terjadi kesalahan, coba lagi.');
                }
            });
        });
    });
</script>

</body>
</html>
