<?php
require_once "lib/images.php";
require_once "lib/template.php";

$gallery = new \images\Gallery();
$page = new \template\Page();
$page->title = 'Directory of Stellas';
$page->body_class = 'list';
?>

<?php foreach($gallery as $image) { ?>
  <a href='/image.php?id=<?=$image->id?>'>
    <img src="<?=$image->src?>" />
    <dl>
      <dt>id</dt> <dd><?=$image->id?></dd>
      <dt>src</dt> <dd><?=$image->src?></dd>
      <dt>title</dt> <dd><?=$image->title?></dd>
    </dl>
  </a>
<?php } ?>

<a href="#top">back to top</a>
