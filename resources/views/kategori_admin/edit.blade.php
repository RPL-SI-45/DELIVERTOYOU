<div style="text-align: center;">
    <h1>Edit Kategori</h1>
    <form action="/kategori_admin/{{$kategori_admin->id}}" method="POST" style="margin: 0 auto;">
        @method('put')
        @csrf
        <input type="text" name="jenis_kategori" value="{{$kategori_admin->jenis_kategori}}" style="padding: 8px; border-radius: 4px; border: 1px solid #ccc; margin-bottom: 10px;">
        <br>
        <input type="submit" name="submit" value="Simpan" style="background-color: #4CAF50; color: white; padding: 8px 16px; border: none; border-radius: 4px; cursor: pointer;">
    </form>
</div>
