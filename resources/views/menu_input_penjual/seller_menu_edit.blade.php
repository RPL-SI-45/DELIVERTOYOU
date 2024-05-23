
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Biryani' rel='stylesheet'>
</head>
<body>
    <form action="/seller/menu/{{$menu_warungs->id}}"  method='POST' enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <select name="nama_kategori" class="form-control">
    @foreach($Kategori_admin  as $value)
         <option value="{{ $value }}">{{ $value }}</option>
     @endforeach
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




