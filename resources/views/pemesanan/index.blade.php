<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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
    .form-box {
      border: 1px solid #ddd;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    .table-responsive {
      overflow-x: auto;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
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
      padding: 10px 15px;
      background-color: green;
      color: white;
      border-radius: 5px;
      cursor: pointer;
    }
    #alamat {
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
        box-sizing: border-box;
        resize: vertical;
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
            @foreach($pemesanan as $ps)
              @foreach($ps->items as $item)
                <tr>
                  <td>{{ $item->menu->nama }}</td>
                  <td>{{ number_format($item->harga, 0, ',', '.') }}</td>
                  <td class="btn-group">
                    <button class="btn-minus" data-id="{{ $item->id }}">-</button>
                    <span id="quantity_{{ $item->id }}" data-harga="{{ $item->harga }}">{{ $item->quantity }}</span>
                    <button class="btn-plus" data-id="{{ $item->id }}">+</button>
                  </td>
                  <td id="total_price_{{ $item->id }}">{{ number_format($item->harga * $item->quantity, 0, ',', '.') }}</td>
                  <td>
                      <form action="{{ route('pemesanan.destroyItem', $item->id) }}" method="POST">
                          @csrf
                          @method('delete')
                          <button type="submit" class="btn-delete" data-id="{{ $item->id }}">Hapus</button>
                      </form>
                  </td>
                </tr>
              @endforeach
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="form-box">
        <h4 id="total_harga">Total Harga : 0</h4>
      </div>
      <label for="alamat">Alamat Penerima:</label>
      <div class="table-responsive">
        <textarea id="alamat" name="alamat" rows="4" cols="50"></textarea>
      </div>
      <button id="btnPembayaran">Lanjut Ke Pembayaran</button>
    </div>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      var btnMinus = document.querySelectorAll('.btn-minus');
      var btnPlus = document.querySelectorAll('.btn-plus');
      updateTotalHarga();

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
        updateTotalHarga();
      }

      function updateTotalHarga() {
        var totalHarga = 0;
        var totalElements = document.querySelectorAll('[id^="total_price_"]');
        totalElements.forEach(function(element) {
          totalHarga += parseFloat(element.innerText.replace(/\./g, '').replace(',', '.'));
        });
        document.getElementById('total_harga').innerText = 'Total Harga : ' + totalHarga.toLocaleString('id-ID');
      }
    });

    const btnPembayaran = document.getElementById('btnPembayaran');
    const alamatInput = document.getElementById('alamat');

    btnPembayaran.addEventListener('click', function() {
      const alamatValue = alamatInput.value.trim();
      if (alamatValue === '') {
        alert('Isi Alamat Terlebih Dahulu');
        return false; // Mencegah pengiriman form
      }
      window.location.href = '/payment/{id}';
    });
  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
