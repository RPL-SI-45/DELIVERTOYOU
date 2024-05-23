<form action="/post" method='POST' enctype="multipart/form-data">
    @csrf

    <h1> Kategori</h1>  
    <select name="nama_kategori" class="form-control">
    @foreach($Pemesanan as $value)
         <option value="{{ $value }}">{{ $value }}</option>
     @endforeach
    </select>
    <h1> Nama</h1>  
    <input type="text" name="nama" placeholder="Nama">
    <h1> Harga </h1> 
    <input type="text" name="harga" placeholder="Harga">
    <h1> Deskirpsi </h1> 
    <input type="text" name="deskripsi" placeholder="Deskripsi"> <br>
    <br>
    
    <div class="form-group">
        <label for="exampleFormControlFile1">Gambar menu</label>
        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="gambar">
    </div>

    <br>

    <button type="submit" class="btn btn-success">Submit</button>
    <a href="/seller/menu" button type="button" class="btn btn-danger">Cancel</button>