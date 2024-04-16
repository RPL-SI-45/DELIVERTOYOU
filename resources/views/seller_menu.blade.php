
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

        @foreach($menu_warungs as $t)
         <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                <img src="{{ asset('gambar_menu/'.$t->gambar) }}" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{$t->nama}}</h5>
                    <p class="card-text">{{$t->kategori}}</p> </br> <p class="card-text">{{$t->nama}}</p> </br> <p class="card-text">{{$t->harga}}</p>  <p class="card-text">{{$t->deskripsi}}</p>
                    <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                </div>
                </div>
            </div>
         </div>
            <tr>

                <td><a href="{{$t->id}}/menu/edit" button type="button" class="btn btn-primary">update</button></td>
                
                <td><a href="/menu/{{$t->id}}" button type="submit" class="btn btn-primary" value='delete'>delete</button> </td>
                
            </tr>
        @endforeach
    </table>

</div>

</body>
</html>



