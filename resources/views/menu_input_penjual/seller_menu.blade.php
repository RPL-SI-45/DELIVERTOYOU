
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
                    <h5 class="card-title"> {{$t->nama}}</h5>
                    <p class="card-text">Kategori : {{$t->kategori}}</p> </br><p class="card-text">Harga Rp.{{$t->harga}}</p>  <p class="card-text">Deskripsi :{{$t->deskripsi}}</p>
                    <p class="card-text"><small class="text-body-secondary"></small></p>
                    <a href="{{$t->id}}/menu/edit"><button class="btn btn-primary">Update</button></a>
                    <div class="container text-center">
                    <div class="row">
                        <div class="col">
                        </div>
                        <div class="col">
                        <div class="col">
                        <!-- <button> <a href="{{$t->id}}/menu/edit" button type="button" class="btn btn-primary">update</button> -->
                        </div>
                        <div class="col">
                        <form action="/menu/{{$t->id}}" method="POST">
                        @csrf 
                        @method('DELETE') 
                        <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
         </div>
        @endforeach
    </table>

    <div class="d-grid gap-2">
    <a href="/seller/menu/input"> <!-- Perhatikan penambahan / di depan rute -->
        <button class="btn btn-primary" type="button">Tambah Menu Baru</button>
    </a>

</div>


</div>

</body>
</html>



