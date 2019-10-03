<?php
require_once "lib/template.php";
require_once "lib/images.php";

$gallery = new \images\Gallery();
$image = $gallery->imageBySrc(@$_GET['src']);

if ($image) {
    $editor = new \images\Editor($image);
    header('Content-Type: image/jpg');
    echo $editor->glitch();
    exit();
}

$page = new \template\Page();
$page->title = 'Glitchy Stella';
?>

<a href="/glitch.php?">Whoa!</a>
<?php $image = $gallery->randomImage() ?>
<img src="?src=<?=urlencode($image->src)?>" />
<p><?=$image->title?></p>
