<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Your Cart</title>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: sans-serif;
        }
        .container {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
        }
        .table img {
            width: 50px;
            height: 50px;
            border-radius: 5px;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .btn-remove {
            background-color: #dc3545;
            border: none;
            color: white;
            padding: 6px 12px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .btn-remove:hover {
            background-color: #c82333;
        }
        .alert-link {
            color: #007bff;
            text-decoration: underline;
        }
        .alert-link:hover {
            color: #0056b3;
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

        .navbar-nav > li > a {
            color: #fff;
        }

        .navbar-nav > li > a:hover {
            color: #f1f1f1;
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
                @if(auth()->check())
                    @if(auth()->user()->role == 'seller')
                        <p class="navbar-text">Halo Seller</p>
                    @elseif(auth()->user()->role == 'customer')
                        <p class="navbar-text">Halo {{ auth()->user()->name }}</p>
                    @endif
                @endif
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="home">HOME</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <h1 class="text-center mb-4">Keranjang</h1>
        @if($cart->count())
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>Gambar</th>
                            <th>Menu</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cart as $item)
                        @if($item->status == 'active')
                        <tr>
                            <td><img src="{{ asset('gambar_menu/'.$item->menu->gambar) }}" alt="{{ $item->menu->nama }}" class="img-fluid"></td>
                            <td>{{ $item->menu->nama }}</td>
                            <td>Rp. {{ number_format($item->menu->harga, 0, ',', '.') }}</td>
                            <td>
                                <form action="{{ route('cart.remove', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-remove">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                        @if($cart->where('status', 'active')->isEmpty())
                        <tr>
                            <td colspan="4" class="text-center">Keranjang Anda kosong!</td>
                        </tr>
                        @else
                        <tr>
                            <td colspan="3"></td>
                            <td>
                                <input type="text" class="form-control" name="kupon" placeholder="Masukkan Kupon">
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
                @if($cart->where('status', 'active')->isNotEmpty())
                <form action="{{ route('pemesanan.store') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">Pesan</button>
                </form>
                @endif
            </div>
        @else
            <div class="alert alert-warning text-center" role="alert">
                Keranjang anda kosong! 
                <a href="/home" class="alert-link">Home</a>
            </div>
        @endif
    </div>

    <!-- Bootstrap JS, Popper.js, and jQuery -->
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
        });
    </script>
</body>
</html>
