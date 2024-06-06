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
        }

        .btn-primary {
            background-color: #4CAF50;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-bottom: 10px;
        }

        .btn-primary:hover {
            background-color: #45a049;
        }

        table {
            margin: 0 auto;
            border-collapse: collapse;
            width: 80%;
        }

        th, td {
            padding: 8px 16px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #B49852;
            color: white;
        }

        .btn-edit {
            background-color: #008CBA;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 5px;
        }

        .btn-edit:hover {
            background-color: #007bb5;
        }

        .btn-delete {
            background-color: #f44336;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-delete:hover {
            background-color: #da190b;
        }
    </style>
</head>
<body>

    <button class="btn-primary" onclick="window.location.href='/kategori_admin/create'">Tambah Kategori</button>
    <table>
        <tr>
            <th>ID</th>
            <th>Kategori</th>
            <th>Aksi</th>
        </tr>
        @foreach($kategori_admin as $w)
        <tr>
            <td>{{$w->id}}</td>
            <td>{{$w->jenis_kategori}}</td>
            <td>
                <button class="btn-edit" onclick="window.location.href='/kategori_admin/{{$w->id}}/edit'">Edit</button>
                <form action="/kategori_admin/{{$w->id}}" method="POST" style="display: inline;">
                    @csrf
                    @method('delete')
                    <button class="btn-delete" type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

</body>
</html>
