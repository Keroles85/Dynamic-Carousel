<?php

spl_autoload_register(function($class_name) {
  require_once($class_name . '.php');
});

$db = new db('localhost','keroles', 'password', 'carousel');

//other way to get count
/* $sql_count = 'select count(id) from items';
$items_count = $db -> query($sql_count) -> fetchColumn();
items_count = $db -> query($sql) -> rowCount(); */

$sql = 'select * from items where visible <> 0 order by active desc';
$items = $db -> query($sql);
$images = $db -> query($sql);
$count = 0;

?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <style>
    .announcement {
      padding: 1em;
    }
    .navbar {
      box-shadow: 0 2px 5px rgba(0,0,0,0.2);
    }
  </style>
  <title>Dynamic Carousel</title>
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="#">Carousel</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Items</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Features</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Pricing</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
    <div class="announcement">Announcement: Lorem ipsum dolor sit amet consectetur adipisicing elit.</div>
  </div>

  <div class="container">
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        
        <!-- php loop for slide buttons -->
        <?php foreach($items as $item): ?>
          <li data-target="#carouselExampleCaptions" data-slide-to="<?= $count ?>" <?= $item['active']? 'class="active"' : '' ?>></li>
        <?php $count++; endforeach; ?>

      </ol>
      <div class="carousel-inner">

      <!-- php loop for slide images -->
      <?php foreach($images as $image): ?>
        <div class="carousel-item <?= $image['active']? 'active' : '' ?>">
          <img src="<?= $image['img_path'] ?>" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5><?= $image['title'] ?></h5>
            <p><?= $image['caption'] ?></p>
          </div>
        </div>
      <?php endforeach; ?>

      </div>
      <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div> <!-- .carousel -->
</div> <!-- .container -->

  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/navbar.js"></script>
</body>
</html>