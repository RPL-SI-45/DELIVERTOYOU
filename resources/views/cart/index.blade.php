<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang</title>
</head>
<body>
    <h1>Keranjang Belanja</h1>

    @if(count($cart) > 0)
        <table>
            <thead>
                <tr>
                    <th>Nama Restoran</th>
                    <th>Nama Makanan</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $item)
                    <tr>
                        <td>{{ $item['restaurant_name'] }}</td>
                        <td>{{ $item['food_name'] }}</td>
                        <td>{{ $item['quantity'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Keranjang Anda kosong.</p>
    @endif
</body>
</html>
