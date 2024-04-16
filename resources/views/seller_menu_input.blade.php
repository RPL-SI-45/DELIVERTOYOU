
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

    <form action="/post" method='POST' enctype="multipart/form-data">
    @csrf

    <h1> Kategori</h1>  
    <select name="jenis_kategori" class="form-control">
    @foreach($Kategori_admin as $value)
         <option value="{{ $value }}">{{ $value }}</option>
     @endforeach
    </select>
    <h1> Nama</h1>  
    <input type="text" name="nama" placeholder="Nama">
    <h1> Harga </h1> 
    <input type="text" name="harga" placeholder="Harga">
    <h1> Deskirpsi </h1> 
    <input type="text" name="deskripsi" placeholder="Deskripsi"> <br>
    
    <div class="form-group">
        <label for="exampleFormControlFile1">Gambar menu</label>
        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="gambar">
    </div>

    <button type="submit" class="btn btn-success">Submit</button>
    <a href="/home" button type="button" class="btn btn-danger">Cancel</button>
    


</body>
</html>




