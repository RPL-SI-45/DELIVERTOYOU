<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Biryani' rel='stylesheet'>
    <title>DeliverToYou</title>
    <style>
        body {
            margin: 0;
            font-family: 'Biryani', sans-serif;
            font-size: 14px;
            background-color: #f5f5f5;
        }

        .navbar {
            background-color: #B49852;
            border: none;
            border-radius: 0;
        }

        .navbar-logo img {
            height: 40px;
            margin-top: 5px;
        }

        .navbar-text {
            color: #fff;
            margin-right: 15px;
            margin-top: 15px;
            font-size: 16px;
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
<div class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div>
                @if(auth()->check())
                    @if(auth()->user()->role == 'admin')
                        <p class="navbar-text">Halo Admin</p>
                    @elseif(auth()->user()->role == 'seller')
                        <p class="navbar-text">Halo Seller</p>
                    @elseif(auth()->user()->role == 'customer')
                        <p class="navbar-text">Halo {{ auth()->user()->name }}</p>
                    @endif
                @endif
            </div>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">LOGOUT</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div style="text-align: center;">
    <button style="background-color: #4CAF50; color: white; padding: 8px 16px; border: none; border-radius: 4px; cursor: pointer; margin-bottom: 10px;" onclick="window.location.href='/kategori_admin/create'">Tambah Kategori</button>
    <table border="1" style="margin: 0 auto; border-collapse: collapse;">
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
</div>

<!-- Include jQuery and Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>

