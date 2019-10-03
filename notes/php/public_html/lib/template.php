<?php namespace template;

class Page {
    public $title = 'Stella Vicious';
    public $body_class = '';
    function __construct() {
        ob_start();
    }
    function __destruct() {
        $this->output = ob_get_clean();
        $this->render();
    }
    function render() {
        echo <<<TEMPLATE
<!doctype html>
<html>
  <head>
    <title>$this->title</title>
    <link rel="stylesheet" href="./styles/all.css" />
  </head>
  <body class="$this->body_class">
    <h1><a class='home' href='/'>Stella Vicious</a></h1>

    $this->output

    <hr />
    <a href="/gallery.php">Browse the Stellas</a>
    <a href="/image.php">Random Stella</a>
    <a href="/glitch.php">Glitchy Stella</a>
    <a href="/list.php">Stella Directory</a>
  </body>
</html>
TEMPLATE;
    }
}
