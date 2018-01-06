<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR.'database/films.php');

  // Check if the user is admin
  if (!isset($_SESSION['admin']) OR ($_SESSION['admin'] !== true)){
    header('Location: '.$BASE_URL);
    exit;
  }

  // Check if all the fields was filled
  if (($_POST['title'] == '') OR ($_POST['year'] == '') OR ($_POST['classEtaria'] == '') OR ($_POST['duration'] == '') OR ($_POST['genre'] == '') OR ($_POST['trailer'] == '') OR ($_POST['sinopse'] == '') OR ($_POST['price'] == '') OR ($_POST['qt'] == '') OR $_FILES['cover'] == ''){
    $_SESSION['form_values'] = $_POST;
    $_SESSION['error_messages'][] = 'Por favor, preencha todos os campos!';
//    header('Location: '.$BASE_URL.'pages/films/addFilm.php');
    exit;
  }

  // Check if it is JPEG image
  if ($_FILES['cover']['type'] !== 'image/jpeg') {
    $_SESSION['form_values'] = $_POST;
    $_SESSION['error_messages'][] = 'Por favor, insira uma imagem do tipo JPEG!';
    header('Location: '.$BASE_URL.'pages/films/addFilm.php');
  }

  $title = strip_tags($_POST['title']);
  $year = strip_tags($_POST['year']);
  $classEtaria = strip_tags($_POST['classEtaria']);
  $duration = strip_tags($_POST['duration']);
  $imdb = strip_tags($_POST['imdb']);
  $genre = strip_tags($_POST['genre']);
  $trailer = strip_tags($_POST['trailer']);
  $sinopse = $_POST['sinopse'];
  $price = strip_tags($_POST['price']);
  $qt = strip_tags($_POST['qt']);

  // Write data in database
  try {
    addFilm($title, $year, $classEtaria, $duration, $imdb, $genre, $trailer, $sinopse, $price, $qt);
  } catch (PDOException $error) {
    print_r($error);
    exit;
  }

  // Get last id
  try {
    $lastFilms = listLatestFilms(1);
    $id = $lastFilms['0']['id'];
  } catch (PDOException $error) {
    print_r($error);
    exit;
  }

  // Create images
  if ($_FILES['cover']['type'] == 'image/jpeg') {
    // Generate filenames for original, small and medium files
    $originalFileName = $BASE_DIR."img/films/cover/originals/$id.jpg";
    $smallFileName = $BASE_DIR."img/films/cover/thumbnails/$id.jpg";
    $mediumFileName = $BASE_DIR."img/films/cover/covers/$id.jpg";

    // Move the uploaded file to its final destination
    move_uploaded_file($_FILES['cover']['tmp_name'], $originalFileName);

    // Crete an image representation of the original image
    $original = imagecreatefromjpeg($originalFileName);

    $width = imagesx($original);     // width of the original image
    $height = imagesy($original);    // height of the original image
    $scaleCheck = (140/120.0) * $width;

    // Create and save a small 120x140 thumbnail
    $small = imagecreatetruecolor(120, 140);
    imagecopyresized($small, $original, 0, 0, 0, ($height>$scaleCheck)?($height-$scaleCheck)/2:0, 120, 140, $width, $scaleCheck);
    imagejpeg($small, $smallFileName);

    // Calculate width and height of medium sized image (max width: 400)
    $mediumwidth = $width;
    $mediumheight = $height;
    if ($mediumwidth > 150) {
      $mediumwidth = 150;
      $mediumheight = $mediumheight * ( $mediumwidth / $width );
    }

    // Create and save a medium image
    $medium = imagecreatetruecolor($mediumwidth, $mediumheight);
    imagecopyresized($medium, $original, 0, 0, 0, 0, $mediumwidth, $mediumheight, $width, $height);
    imagejpeg($medium, $mediumFileName);

//    unlink($originalFilename);

    $_SESSION['success_messages'][] = 'Filme adicionado com sucesso!';
    header("Location: ".$BASE_URL."pages/films/film.php?id=$id");
  }
 ?>
