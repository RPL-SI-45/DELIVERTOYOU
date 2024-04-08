<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Daftar Pemesanan</title>
</head>
<body>
<h2>Daftar Pemesanan</h2>
<table border="3">
    <thead>
        <tr>
            <th>ID</th>
            <th>Menu</th>
            <th>Harga</th>
            <th>Quantity</th>
            <th>Total Harga</th>
            <th>Alamat</th>
            <th>Jenis Pembayaran</th>
        </tr>
        @foreach($pemesanan as $ps)
        <tr>
            <td>{{$ps->id}}</td>
            <td>{{$ps->menu}}</td>
            <td>{{ number_format($ps->harga, 0, ',', '.') }}</td> <!-- Format harga Rupiah -->
            <td>
                <button class="btn-minus" data-id="{{$ps->id}}">-</button>
                <span id="quantity_{{$ps->id}}" data-harga="{{$ps->harga}}">{{$ps->quantity}}</span>
                <button class="btn-plus" data-id="{{$ps->id}}">+</button>
            </td>
            <td id="total_price_{{$ps->id}}">{{ number_format($ps->harga * $ps->quantity, 0, ',', '.') }}</td> <!-- Format total_harga Rupiah -->
            <td>{{$ps->alamat}}</td>
            <td>{{$ps->jenis_pembayaran}}</td>
        </tr>
        @endforeach
    </thead>
    <tbody>
</table>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Mengambil semua tombol kurang dan tambah
        var btnMinus = document.querySelectorAll('.btn-minus');
        var btnPlus = document.querySelectorAll('.btn-plus');

        // Menambah event listener pada setiap tombol kurang
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

        // Menambah event listener pada setiap tombol tambah
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

        // Fungsi untuk memperbarui total harga
        function updateTotalPrice(id, quantity, harga) {
            var totalHarga = harga * quantity;
            document.querySelector('#total_price_' + id).innerText = totalHarga.toLocaleString('id-ID');
        }
    });
</script>
</body>
</html>
