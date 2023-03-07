<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="style2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
  <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt=""> </div>
    </header>
    <div class="l-navbar" id="nav-bar" style="width:200px;">
        <nav class="nav">
            <div> 
                
            <div class="nav_list"> <a href="/dashboard" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'><span class="nav_name" style="text-decoration:none">Dashboard</span></i> </a>
                <div class="nav_list"> <a href="/produk" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'><span class="nav_name">Kelola Data</span></i> </a> 
            </div>
            </div>
             <a href="login" class="nav_link"> <i class='bx bx-log-out nav_icon'><span class="nav_name">Logout</span> </i></a>
        </nav>
    </div>
    <div style="margin-left: 10%;">
    <h1>Halaman Kelola Data Produk</h1>
    <a href="/tambah" class="btn btn-dark btn-lg border">Tambah</a>
    <table class="table table-responsive table-striped border mt-4">
        <thead>
            <tr class="text-center">  
                
                <th scope="col">ID produk</th>
                <th scope="col">Nama produk</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Harga</th>
                <th scope="col">Gambar</th>
                <th scope="col">Aksi</th>
</tr>
</thead>
<tbody>
    @foreach($data as $tables =>$table)
    <tr class="text-center">
        <td>{{$table->id}}</td>
        <td>{{$table->judulProduk}}</td>
        <td>{{$table->descripsi}}</td>
        <td>{{$table->harga}}</td>
        <td><img src="{{asset('foto/'.$table->gambar) }}" width="50px"></td>
        <td>
            <a href="/edit/{{$table->id}}" class="btn btn-dark">Edit</a>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal"data-bs-target="#hapus">hapus</button>
</td>
</tr>

   <div class="modal fade" id="hapus" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledy="staticBackdroplabel"aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-secondary" style="padding: 20px; height: 300px; magrin-top:30%; width: 520px;">
        <div class="modal-body">
            <h3>Produk Berhasil Di Hapus(kembali ke halaman produk)</h3>
</div>
          <a href="/hapus/{{$table->id}}" style="margin-left:20%" class="btn btn-light w-50 mt-4">oke</a>
</div>
</div>
</div>
</div>
@endforeach
</tbody>
</table>
</div>


 


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>
