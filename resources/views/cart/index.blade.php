<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <style>
        .container {
            width: 80%;
            margin: 0 auto;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        .table th {
            background-color: #f2f2f2;
        }
        .table img {
            width: 50px;
            height: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Keranjang</h1>
        @if(session('cart'))
            <table class="table">
                <thead>
                    <tr>
                        <th>Gambar</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Action</th> <!-- New column for remove action -->
                    </tr>
                </thead>
                <tbody>
                    @foreach(session('cart') as $id => $details)
                    <tr>
                        <td><img src="{{ asset('gambar_menu/'.$details['gambar']) }}" alt="{{ $details['nama'] }}"></td>
                        <td>{{ $details['nama'] }}</td>
                        <td>Rp. {{ $details['harga'] }}</td>
                        <td>
                            <form action="{{ route('cart.remove', $id) }}" method="POST">
                                @csrf
                                <button type="submit">Remove</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Keranjang anda kosong!</p>
        @endif
    </div>
</body>
</html>
