<?php
$data = file_get_contents('data/menu.json');
$menu = json_decode($data, true);

$menu = $menu["menu"];
?>
<!doctype html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

   <title>Savira Catering!</title>
</head>

<body>

   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
         <a class="navbar-brand" href="#">
            <img src="img/logo.png" width="50">
         </a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
               <a class="nav-link active" href="#">All Menu</a>
            </div>
         </div>
      </div>
   </nav>


   <div class="container">

      <div class="row">
         <div class="col mt-3">
            <h1>All Menu</h1>
         </div>
      </div>

      <div class="row">
         <?php foreach ($menu as $row) : ?>
            <div class="col-md-4">
               <div class="card mb-3">
                  <img src="img/menu/<?= $row['gambar']; ?>" class="card-img-top">
                  <div class="card-body">
                     <h5 class="card-title"><?= $row['nama']; ?></h5>
                     <p class="card-text"><?= $row['deskripsi']; ?></p>
                     <h5 class="card-title">Rp. <?= number_format($row['harga'], 2, ",", "."); ?></h5>
                     <a href="#" class="btn btn-primary">Order Now</a>
                  </div>
               </div>
            </div>
         <?php endforeach; ?>
      </div>

   </div>


   <!-- Optional JavaScript; choose one of the two! -->
   <!-- Option 2: jQuery, Popper.js, and Bootstrap JS -->
   <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</body>

</html>