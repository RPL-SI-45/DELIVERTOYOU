<div style="text-align: center;">
    <button style="background-color: #4CAF50; color: white; padding: 8px 16px; border: none; border-radius: 4px; cursor: pointer; margin-bottom: 10px;" onclick="window.location.href='/kategori_admin/create'">Tambah Kategori</button>
    <table border="1" style="margin: 0 auto; border-collapse: collapse;">
        <tr>
            <th style="padding: 8px 16px;">ID</th>
            <th style="padding: 8px 16px;">Kategori</th>
            <th style="padding: 8px 16px;">Aksi</th>
        </tr>
        @foreach($kategori_admin as $w)
            <tr>
                <td style="padding: 8px 16px;">{{$w->id}}</td>
                <td style="padding: 8px 16px;">{{$w->jenis_kategori}}</td>
                <td style="padding: 8px 16px;">
                    <button style="background-color: #008CBA; color: white; padding: 5px 10px; border: none; border-radius: 4px; cursor: pointer; margin-right: 5px;" onclick="window.location.href='/kategori_admin/{{$w->id}}/edit'">Edit</button>
                    <form action="/kategori_admin/{{$w->id}}" method="POST" style="display: inline;">
                        @csrf
                        @method('delete')
                        <button style="background-color: #f44336; color: white; padding: 5px 10px; border: none; border-radius: 4px; cursor: pointer;" type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</div>
