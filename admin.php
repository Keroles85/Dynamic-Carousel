<?php

spl_autoload_register(function($class_name) {
  require_once($class_name . '.php');
});

$db = new db('localhost','keroles', 'password', 'carousel');
$sql = 'select * from items';
$items = $db -> query($sql);

?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" href="css/main.css">
  <title>Carousel Admin Page</title>
  <style>
    .h1 {
      margin: 20px 0 50px 20px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1 class="h1">Carousel Control Page.</h1>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Title</th>
          <th scope="col">Caption</th>
          <th scope="col">Image URL</th>
          <th scope="col">Visible</th>
          <th scope="col">Active</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>

      <?php foreach($items as $item): ?>

      <tr>
        <th scope="row">
          <input type="text" value="<?= $item['title'] ?>">
        </th>
        <td>
          <textarea rows="5" cols="25"><?= $item['caption'] ?></textarea>
        </td>
        <td><img src="<?= $item['img_path'] ?>" class="img-fluid"></td>
        <td>
          <input type="checkbox" <?php if($item['visible']) {echo 'checked';} ?>>
        </td>
        <td>
          <input type="radio" name="active" <?php if($item['active']) {echo 'checked';} ?>>
          </td>
        <td>
          <a href="delete.php?id=<?= $item['id'] ?>" class="btn btn-danger">
            <i class="fas fa-trash"></i>
          </a>
        </td>
      </tr>

      <?php endforeach ?>

      <tr>
        <td style="border-top: none;">
          <button class="btn btn-primary">Update</button>
        </td>
      </tr>

      </tbody>
    </table>
  </div>
  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>