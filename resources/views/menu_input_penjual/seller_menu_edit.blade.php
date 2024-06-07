<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Menu Edit</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Biryani' rel='stylesheet'>

    <style>
        body {
            font-family: 'Biryani', sans-serif;
            padding: 20px;
        }

        .form-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #f7f7f7;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .form-container h1 {
            font-size: 24px;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .form-group label {
            font-size: 16px;
            margin-bottom: 5px;
            display: block;
        }

        .form-group input, 
        .form-group select {
            font-size: 16px;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
        }

        .form-group input[type="file"] {
            padding: 3px;
        }

        .btn-success, 
        .btn-danger {
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 4px;
            border: none;
            cursor: pointer;
        }

        .btn-success {
            background-color: #28a745;
            color: white;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .btn-cancel {
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <form action="/seller/menu/{{$menu_warungs->id}}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <h1>Edit Menu</h1>

            <div class="form-group">
                <label for="nama_kategori">Kategori</label>
                <select name="nama_kategori" class="form-control">
                    @foreach($Kategori_admin as $value)
                        <option value="{{ $value }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" placeholder="Nama" class="form-control">
            </div>

            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="text" name="harga" placeholder="Harga" class="form-control">
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <input type="text" name="deskripsi" placeholder="Deskripsi" class="form-control">
            </div>

            <div class="form-group">
                <label for="exampleFormControlFile1">Gambar menu</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="gambar">
            </div>

            <button type="submit" class="btn btn-success">Submit</button>
            <a href="/seller/menu" class="btn btn-danger btn-cancel">Cancel</a>
        </form>
    </div>
</body>
</html>
