



<form action="/post" method='POST'>
    @csrf
    <h1> Keberangkatan </h1> 
    <input type="text" name="kategori" placeholder="Keberangkatan"> <br>
    <h1> Tujuan</h1> 
    <input type="text" name="nama" placeholder="Nama">
    <h1> Jam </h1> 
    <input type="text" name="harga" placeholder="Harga">
    <h1> Tanggal </h1> 
    <input type="date" name="deskripsi" placeholder="Deskripsi"> <br>

    <br>
    <br>

    <button type="submit" class="btn btn-success">Submit</button>
    <a href="/home" button type="button" class="btn btn-danger">Cancel</button>

