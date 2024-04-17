<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>

    <table class="table table-hover">
        <tr>
            <th>ID</th>
            <th>Menu</th>
            <th>Harga</th>
            <th>Quantity</th>
            <th>Total Harga</th>
            <th>Alamat</th>
            <th>Status Pemesanan</th>
            
        </tr>
        @foreach($acc_pemesanan as $t)
        
        <tr>
        <td>{{ $t->id }}</td>
        <td>{{ $t->menu }}</td>
        <td>{{ $t->harga }}</td>
        <td>{{ $t->quantity }}</td>
        <td>{{ $t->total_harga }}</td>
        <td>{{ $t->alamat }}</td>
        <td>{{ $t->status_pemesanan }}</td>

        <td>
            <form action="{{ route('up_to_cook') }}" method="POST">
                @csrf
                 <input type="hidden" name="id" value="{{ $t->id }}">
            <button type="submit" class="btn btn-primary">Update</button>

        </form>
    </td>
</tr>



            
            @endforeach
    </table>
    


    
</body>
</html>