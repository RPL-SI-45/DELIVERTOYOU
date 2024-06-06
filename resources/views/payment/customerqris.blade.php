<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran QRIS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .payment-form {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .payment-form h2 {
            margin-bottom: 20px;
            color: #343a40;
        }
        .form-group label {
            font-weight: 500;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .form-group img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto 15px auto;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-10">
            <div class="payment-form">
                <h2>Pembayaran QRIS</h2>
                <form action="{{ route('payment.storeQris', ['pemesananId' => $pemesanan->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @foreach($qris as $qr) 
                    <div class="form-group mb-3">
                        <label for="qris_image">Payment QRIS</label> <br>
                        <img src="{{ Storage::url($qr->qrcode) }}" alt="QRIS Image" id="qris_image" class="img-fluid">
                    </div>
                    <div class="form-group mb-3">
                        <label for="proof_of_payment">Unggah Bukti Pembayaran</label> <br>
                        <input type="file" name="bukti" id="bukti" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                    @endforeach
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>