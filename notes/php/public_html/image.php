<?php
require_once "lib/images.php";
require_once "lib/template.php";

$gallery = new \images\Gallery();
$image = $gallery->imageById(@$_GET['id']);

if (!$image) {
  $queryString = explode('?', $_SERVER['HTTP_REFERER']);
  array_shift($queryString);
  $queryString = implode('?', $queryString);
  parse_str($queryString, $data);
  do {
    $number = random_int(0, count($gallery->images) - 1);
    echo "$number, {$data['id']}";
  } while ($number == @$data['id']);
  header("Location: /image.php?id=$number");
  exit();
}

$page = new \template\Page();
$page->title = 'Random Image of Stella';
?>

<a href="/image.php">show me another</a>
<img src="<?=$image->src?>" />
<p><?=$image->title?></p>
