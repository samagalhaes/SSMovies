<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR.'database/films.php');

  // Check if the user is admin
  if (!isset($_SESSION['admin']) OR ($_SESSION['admin'] !== true)){
    header('Location: '.$INIT_PAGE);
    exit;
  }

  if (isset($_POST['delete'])) {
    try {
      deleteFilm($_POST['id']);
    } catch (\Exception $e) {
      $_SESSION['error_messages'][] = 'Erro ao apagar o filme!';
      header('Location: '.$_SERVER['HTTP_REFERER']);
      exit;
    }

    $_SESSION['success_messages'][] = 'Filme apagado com sucesso!';
    header('Location: '.$INIT_PAGE);
    exit;
  }

  if (isset($_POST['edit'])) {
    header('Location: '.$BASE_URL."pages/films/editFilm.php?id=".$_POST['id']);
    exit;
  }

  if (isset($_POST['change'])) {
    // Check if all the fields was filled
    if (($_POST['title'] == '') OR ($_POST['year'] == '') OR ($_POST['classEtaria'] == '') OR ($_POST['duration'] == '') OR ($_POST['genre'] == '') OR ($_POST['trailer'] == '') OR ($_POST['sinopse'] == '') OR ($_POST['price'] == '') OR ($_POST['qt'] == '')){
      $_SESSION['form_values'] = $_POST;
      $_SESSION['error_messages'][] = 'Por favor, preencha todos os campos!';
      header('Location: '.$BASE_URL.'pages/films/editFilm.php?id='.$_POST['id']);
      exit;
    }

    // Check if it is JPEG image
    if (isset($_FILES['cover'])){
      if ($_FILES['cover']['type'] !== 'image/jpeg') {
        $_SESSION['form_values'] = $_POST;
        $_SESSION['error_messages'][] = 'Por favor, insira uma imagem do tipo JPEG!';
        header('Location: '.$BASE_URL.'pages/films/editFilm.php?id='.$_POST['id']);
      }
    }

    $id = strip_tags($_POST['id']);
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
      editFilm($id, $title, $year, $classEtaria, $duration, $imdb, $genre, $trailer, $sinopse, $price, $qt);
    } catch (PDOException $error) {
      print_r($error);
      exit;
    }

    // Create images
    if (isset($_FILES['cover'])) {
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

      unlink($originalFilename);

      $_SESSION['success_messages'][] = 'Filme editado com sucesso!';
      header("Location: ".$BASE_URL."pages/films/film.php?id=$id");
    }
  }

?>
