<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
            @foreach($SellerDash as $t)
                <div class="container mt-5">
                 <div class="table-container">
                  <div class="table-column">
                     <img src="{{ asset('img_example/makanan.png') }}" alt="Image 3" class="custom-img-size">
                    <div class="table-cell font-weight-bold">$count</div>
                    <div class="table-cell">ID : {{ $t->id }}</div>
                    <div class="table-cell">Menu : {{ $t->menu }}</div>
                    <div class="table-cell">Status : {{ $t->status_pemesanan }}</div>
                    <div class="table-cell">Total  : {{ $t->total_harga }}</div>

                    <a href="/order/{{$t->id}}/status/detail" a type="button" class="btn btn-dark">Detail</a>   

             @endforeach
                </div>
                 </div>
                  </div>   
      
</body>
</html>