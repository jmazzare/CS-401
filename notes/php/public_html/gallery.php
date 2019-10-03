<?php
require_once "lib/template.php";
require_once "lib/images.php";

$gallery = new \images\Gallery();
$id = @$_GET['image'];
$image = $gallery->imageById($id);

if (!$image) {
  header("Location: /gallery.php?image=1");
  exit();
}

$page = new \template\Page();
$page->title = 'Gallery of Stella';
$page->body_class = 'gallery';
?>

  <?php if($gallery->hasPrevious($id)) { ?>
    <a href="/gallery.php?image=<?=($id-1)?>"> back </a>
  <?php } else { ?>
    <a href="#" class='disabled'> back </a>
  <?php } ?>

    <img width="300px" height="300px" src="<?=$image->src?>" />
    <p><?=$image->title?></p>

  <?php if($gallery->hasNext($id)) { ?>
    <a href="/gallery.php?image=<?=($id+1)?>"> forward </a>
  <?php } else { ?>
    <a href="#" class='disabled'> forward </a>
  <?php } ?>
