<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran QRIS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
</head>
<body>
    <div class="container mt-5">
    
        <h2>Pembayaran QRIS</h2>
        <form action="/payment/qris/{{ $pemesananId }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
            <label for="qris_image">Payment QRIS</label> <br>
            <img src="cthqr.jpg" alt="QRIS Image" id="qris_image">
            </div>
            <div class="form-group">
                <label for="proof_of_payment">Unggah Bukti Pembayaran</label> <br>
                <input type="file" name="bukti" id="bukti" class="form-control-file" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>