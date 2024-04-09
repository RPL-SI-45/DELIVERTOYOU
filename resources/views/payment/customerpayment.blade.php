
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
</head>
<body>
<div class="container mt-5">
    
        <h2>Pilih Metode Pembayaran</h2>
        <form action="/payment/store" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="payment_method">Pilih Metode Pembayaran</label>
                <select name="payment_method" id="payment_method" class="form-control">
                    <option value="qris">QRIS</option>
                    <option value="cash">Tunai</option>
                </select>
            </div>
            <div class="form-group">
                <label for="total_amount">Total Bayar</label>
                <input type="number" name="total_amount" id="total_amount" class="form-control" value="{{ $pemesanan->total_harga }}" readonly>
            </div>
            @if ($pemesanan->jenis_pembayaran == 'QRIS')
            <div class="form-group">
                <label for="proof_of_payment">Unggah Bukti Pembayaran</label> <br>
                <input type="file" name="proof_of_payment" id="proof_of_payment" class="form-control-file" required>
            </div>
            @endif
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>