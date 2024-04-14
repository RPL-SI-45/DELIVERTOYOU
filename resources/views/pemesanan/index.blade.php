<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pemesanan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        h2 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .btn-group {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .btn-minus, .btn-plus, .btn-delete {
            padding: 5px 10px;
            border: none;
            cursor: pointer;
        }
        .btn-delete {
            background-color: red;
            color: white;
        }
        #btnPembayaran {
            display: block;
            width: 100%;
            margin-top: 20px;
            padding: 10px;
            background-color: green;
            color: white;
            border: none;
            cursor: pointer;
        }
        @media (max-width: 768px) {
            .btn-group {
                flex-direction: column;
            }
            .btn-minus, .btn-plus {
                margin-bottom: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Daftar Pemesanan</h2>
        <table>
            <thead>
                <tr>
                    <th>Nama Pelanggan</th>
                    <th>Menu</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pemesanan as $ps)
                <tr>
                    <td>{{$ps->nama_pelanggan}}</td>
                    <td>{{$ps->menu}}</td>
                    <td>{{ number_format($ps->harga, 0, ',', '.') }}</td>
                    <td class="btn-group">
                        <button class="btn-minus" data-id="{{$ps->id}}">-</button>
                        <span id="quantity_{{$ps->id}}" data-harga="{{$ps->harga}}">{{$ps->quantity}}</span>
                        <button class="btn-plus" data-id="{{$ps->id}}">+</button>
                    </td>
                    <td id="total_price_{{$ps->id}}">{{ number_format($ps->harga * $ps->quantity, 0, ',', '.') }}</td>
                    <td>
                        <input type="text" id="alamat_{{$ps->id}}" name="alamat_pelanggan[]" value="{{$ps->alamat_pelanggan}}">
                    </td>
                    <td>
                        <form action="/pemesanan/{{$ps->id}}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn-delete" data-id="{{$ps->id}}">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <button id="btnPembayaran">Lanjut Ke Pembayaran</button>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var btnMinus = document.querySelectorAll('.btn-minus');
            var btnPlus = document.querySelectorAll('.btn-plus');

            btnMinus.forEach(function(button) {
                button.addEventListener('click', function() {
                    var id = this.getAttribute('data-id');
                    var quantityElement = document.getElementById('quantity_' + id);
                    var quantity = parseInt(quantityElement.innerText);
                    var harga = parseFloat(quantityElement.getAttribute('data-harga'));
                    if (quantity > 0) {
                        quantity -= 1;
                        quantityElement.innerText = quantity;
                        updateTotalPrice(id, quantity, harga);
                    }
                });
            });

            btnPlus.forEach(function(button) {
                button.addEventListener('click', function() {
                    var id = this.getAttribute('data-id');
                    var quantityElement = document.getElementById('quantity_' + id);
                    var quantity = parseInt(quantityElement.innerText);
                    var harga = parseFloat(quantityElement.getAttribute('data-harga'));
                    if (quantity < 99) {
                        quantity += 1;
                        quantityElement.innerText = quantity;
                        updateTotalPrice(id, quantity, harga);
                    }
                });
            });

            function updateTotalPrice(id, quantity, harga) {
                var totalHarga = harga * quantity;
                document.querySelector('#total_price_' + id).innerText = totalHarga.toLocaleString('id-ID');
            }
        });
    </script>
</body>
</html>
