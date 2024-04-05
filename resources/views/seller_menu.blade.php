
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
</head>
<body>

    <table class="table table-hover">
        <tr>
            <th>id</th>
            <th>kategori</th>
            <th>nama</th>
            <th>harga</th>
            <th>deskirpsi</th>
            <th>gambar</th>
        </tr>
        @foreach($menu_warungs as $t)
        
            <tr>

                <td>{{$t->id}}</td>
                <td>{{$t->kategori}}</td>
                <td>{{$t->nama}}</td>
                <td>{{$t->harga}}</td>
                <td>{{$t->deskripsi}}</td>
                <td>
                    <img src ="{{ asset('gambar_menu/'.$t->gambar) }}" style="width: 70px; height:70px;" alt="">
                </td>
                <td><a href="{{$t->id}}/menu/edit" button type="button" class="btn btn-primary">update</button></td>
                
                <td><a href="/menu/{{$t->id}}" button type="submit" class="btn btn-primary" value='delete'>delete</button> </td>
                
                
            
            </tr>
        @endforeach
    </table>
    
</body>
</html>



