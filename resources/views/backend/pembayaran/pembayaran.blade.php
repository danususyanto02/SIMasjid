<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  
</head>
<body>
    <form action="/payment" method="GET">
        <div class="form-group mr-40 mt-10 ml-40">
          <label for="exampleInputEmail1">Nama</label>
          <input name="nama" type="text" class="form-control" id="nama" aria-describedby="nama" placeholder="Nama">
        </div>
        <div class="form-group mr-40  ml-40">
            <label for="exampleInputEmail1">Email</label>
            <input name="email" type="email" class="form-control" id="email" aria-describedby="email" placeholder="Email">
          </div>
          <div class="form-group mr-40  ml-40">
            <label for="exampleInputEmail1">Nomor</label>
            <input name="number" type="number" class="form-control" id="number" aria-describedby="number" placeholder="number">
          </div>
        <button type="submit" class="btn btn-primary mr-40 ml-40 ">Submit</button>
      </form>
      @if(session('alert-success'))
          <script>alert('{{session('alert-success')}}')</script>
      @elseif(session('alert-failed'))
      <script>alert('{{session('alert-failed')}}')</script>
      @endif
</body>
</html>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>