ht


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

@foreach($menu_warungs as $t)
</div>
 <div class="card" style="width: 18rem;">
  <img class="card-img-top" src="{{ asset('gambar_menu/'.$t->gambar) }}" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">{{$t->nama}} Kategori : {{$t->kategori}}  Harga Rp.{{$t->harga}} Deskripsi :{{$t->deskripsi}}</p>
    <a href="/seller/{{$t->id}}/menu/edit" class="btn btn-primary">Ubah data menu kamu</a>
  </div>
</div>
</div>
@endforeach

<a href="/seller/menu/input"> <!-- Perhatikan penambahan / di depan rute -->
        <button class="btn btn-primary" type="button">Tambah Menu Baru</button>
</a>

</body>
</html>



