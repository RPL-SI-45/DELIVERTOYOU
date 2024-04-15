<table border="1">
    <tr>
        <th>ID</th>
        <th>KATEGORI</th>
    </tr>
    @foreach($kategori_admin as $w)
        <tr>
            <td>{{$w->id}}</td>
            <td>{{$w->jenis_kategori}}</td>
        </tr>
    @endforeach
</table>
