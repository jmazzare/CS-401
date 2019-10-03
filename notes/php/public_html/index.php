<?php
require_once "lib/template.php";
require_once "lib/images.php";

$page = new \template\Page();
$gallery = new \images\Gallery();
?>

<img src="<?=$gallery->images[0]->src ?>" />
<p><?=$gallery->images[0]->title ?></p>
