<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Biryani' rel='stylesheet'>
    <style>
        body {
            margin: 0;
            font-family: 'Biryani', sans-serif;
            font-size: 14px;
            background-color: #f5f5f5;
            text-align: center;
            padding-top: 50px;
        }

        h1 {
            color: #B49852;
        }

        form {
            display: inline-block;
            margin: 0 auto;
            text-align: left;
        }

        input[type="text"], input[type="submit"] {
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
            width: 100%;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <h1>Tambah Kategori</h1>
    <form action="/kategori_admin/store" method="POST">
        @csrf
        <input type="text" name="jenis_kategori" placeholder="Jenis Kategori">
        <br>
        <input type="submit" name="submit" value="Simpan">
    </form>

</body>
</html>
