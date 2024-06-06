<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Daftar Pemesanan</title>
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

        .btn-primary-custom {
            background-color: #007bff;
            border: none;
            color: white;
            padding: 8px 16px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .btn-primary-custom:hover {
            background-color: #0056b3;
        }

        .btn-delete {
            background-color: #dc3545;
            border: none;
            color: white;
            padding: 6px 12px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .btn-delete:hover {
            background-color: #c82333;
        }

        #btnPembayaran {
            background-color: #28a745;
            border: none;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        #btnPembayaran:hover {
            background-color: #218838;
        }

        /* Your CSS styles here */
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
                        @if(auth()->user()->role == 'admin')
                            <p class="navbar-text">Halo Admin</p>
                        @elseif(auth()->user()->role == 'seller')
                            <p class="navbar-text">Halo Seller</p>
                        @elseif(auth()->user()->role == 'customer')
                            <p class="navbar-text">Halo {{ auth()->user()->name }}</p>
                        @endif
                    @endif
                </div>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#" onclick="window.history.back();">BACK</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <h2>Daftar Pemesanan</h2>
        <div class="form-box">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Menu</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pemesanan as $ps)
                            @forelse($ps->items as $item)
                                <tr>
                                    <td>{{ $item->menu->nama }}</td>
                                    <td>{{ number_format($item->harga, 0, ',', '.') }}</td>
                                    <td class="btn-group">
                                        <form action="{{ route('pemesanan.updateQuantity', $item->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('patch')
                                            <input type="hidden" name="action" value="decrease">
                                            <button type="submit" class="btn-minus">-</button>
                                        </form>
                                        <span id="quantity_{{ $item->id }}" data-harga="{{ $item->harga }}">{{ $item->quantity }}</span>
                                        <form action="{{ route('pemesanan.updateQuantity', $item->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('patch')
                                            <input type="hidden" name="action" value="increase">
                                            <button type="submit" class="btn-plus">+</button>
                                        </form>
                                    </td>
                                    <td id="total_price_{{ $item->id }}">{{ number_format($item->harga * $item->quantity, 0, ',', '.') }}</td>
                                    <td>
                                        <form action="{{ route('pemesanan.destroyItem', $item->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn-delete">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Tidak ada item dalam pemesanan.</td>
                                </tr>
                            @endforelse
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada item dalam pemesanan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                @if($pemesanan->flatMap->items->isEmpty())
                    <p class="text-center">Tidak ada item dalam pemesanan.</p>
                @endif
            </div>
            <div class="form-box">
                <h4 id="total_harga">Total Harga: {{ number_format($pemesanan->flatMap->items->sum(fn($item) => $item->harga * $item->quantity), 0, ',', '.') }}</h4>
            </div>
            <form action="{{ route('submit.alamat') }}" method="POST">
                @csrf
                <label for="alamat">Alamat Penerima:</label>
                <div class="table-responsive">
                    <textarea id="alamat" name="alamat" rows="4" cols="50">{{ $alamat ?? '' }}</textarea>
                </div>
                <button type="submit">Submit</button>
            </form>
            @if($pemesanan->flatMap->items->isNotEmpty())
            <form action="{{ route('payment.index', ['pemesananId' => $pemesanan->first()->id]) }}" method="GET">
                @csrf
                <button type="submit" id="btnPembayaran">Lanjut Ke Pembayaran</button>
            </form>
            @endif
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        const btnPembayaran = document.getElementById('btnPembayaran');
        const alamatInput = document.getElementById('alamat');

        btnPembayaran.addEventListener('click', function() {
            const alamatValue = alamatInput.value.trim();
            if (alamatValue === '') {
                alert('Isi Alamat Terlebih Dahulu');
                return false; // Mencegah pengiriman form
            }
        });
    </script>
</body>
</html>
