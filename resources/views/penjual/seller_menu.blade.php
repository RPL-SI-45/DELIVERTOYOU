
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <table class="table table-hover">
        <tr>
            <th>id</th>
            <th>keberangkatan</th>
            <th>tujuan</th>
            <th>jam</th>
            <th>tanggal</th>
        </tr>
        @foreach($jadwal_tab as $t)
            <tr>

                <td>{{$t->id}}</td>
                <td>{{$t->keberangkatan}}</td>
                <td>{{$t->tujuan}}</td>
                <td>{{$t->jam}}</td>
                <td>{{$t->tanggal}}</td>
                <td><a href="{{$t->id}}/edit" button type="button" class="btn btn-primary">update</button></td>
                <td><a href="/tiket/{{$t->id}}" button type="submit" class="btn btn-primary" value='delete'>delete</button> </td>
                
            
            </tr>
        @endforeach
    </table>
    
</body>
</html>



