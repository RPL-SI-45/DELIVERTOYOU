
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/post" method='POST'>
    @csrf
    <h1> Keberangkatan </h1> 
    <input type="text" name="kategori" placeholder="Kategori"> <br>
    <h1> Tujuan</h1> 
    <input type="text" name="nama" placeholder="Nama">
    <h1> Jam </h1> 
    <input type="text" name="harga" placeholder="Harga">
    <h1> Tanggal </h1> 
    <input type="date" name="deskripsi" placeholder="Deskripsi"> <br>
    
  

    <form>
    <div class="form-group">
        <label for="exampleFormControlFile1">Example file input</label>
        <input type="file" class="form-control-file" id="exampleFormControlFile1">
    </div>
  </form>

    <br>
    <br>
    @section('content')

    <button type="submit" class="btn btn-success">Submit</button>
    <a href="/home" button type="button" class="btn btn-danger">Cancel</button>
    
</body>
</html>




