<?php namespace images;

class Image {
    public $id;
    public $src;
    public $title;
    function __construct($id, $src, $title) {
        $this->id = $id;
        $this->src = $src;
        $this->title = $title;
    }
    function toHtml() {
        return "<img src='$this->src' alt='$this->title' />";
    }
}

class Gallery implements \IteratorAggregate {
    public $images;
    function __construct() {
        $this->images = [];
        foreach ([
            ['/images/stella-1.jpg', 'Stella at her most vicious'],
            ['/images/stella-2.jpg', 'Stella and Zeke disagree on politics'],
            ['/images/stella-3.jpg', 'Stella "watching college football"'],
            ['/images/stella-4.jpg', 'Stella\'s 10th Birthday'],
            ['/images/stella-5.jpg', 'Stella slacking off on the job'],
            ['/images/stella-6.jpg', 'Hide \'n Stella'],
            ['/images/stella-7.jpg', 'Stella can\'t find soft grass <em>anywhere</em>.'],
            ['/images/stella-8.jpg', 'Stella board'],
            ['/images/stella-9.jpg', 'Stella bored']
        ] as $id => $data) {
            list($src, $title) = $data;
            $this->images[] = new Image($id, $src, $title);
        }
    }
    function getIterator() {
        return new \ArrayIterator($this->images);
    }
    function imageBySrc($src) {
        foreach ($this as $image) {
            if ($image->src == $src) {
                return $image;
            }
        }
        return null;
    }
    function imageById($id) {
        if (empty($id) && $id !== "0") return null;
        foreach ($this as $image) {
            if ($image->id == $id) {
                return $image;
            }
        }
        return null;
    }
    function hasNext($id) {
        return ($id + 1) < count($this->images);
    }
    function hasPrevious($id) {
        return ($id - 1) >= 0;
    }
    function randomImage() {
        $index = \random_int(0, count($this->images) - 1);
        return $this->images[$index];
    }
}

class Editor {
    private $path;
    private $image;
    function __construct($image) {
        $src = $image instanceof Image ? $image->src : $image;
        $this->path = __DIR__ . '/..' . $src;
    }
    function glitch() {
        $this->image = imagecreatefromjpeg($this->path);
        $this->maybe('negate');
        $this->maybe('colorize');
        $this->maybe('sketch');

        ob_start();
        imagejpeg($this->image, NULL, 60);
        imagedestroy($this->image);
        $data = ob_get_clean();
        $hex = bin2hex($data);
        $hex = $this->corrupt($hex);
        $data = hex2bin($hex);

        return $data;
    }
    protected function maybe($method) {
        if (rand(0,1) == 1) {
            $this->$method();
        }
    }
    protected function negate() {
        \imagefilter($this->image, \IMG_FILTER_NEGATE);
    }
    protected function colorize() {
        $red = random_int(0,150);
        $blue = random_int(0, 200 - $red);
        $green = random_int(0, 200 - $blue);
        \imagefilter($this->image, \IMG_FILTER_COLORIZE, $red, $green, $blue);
    }
    protected function sketch() {
        \imagefilter($this->image, \IMG_FILTER_MEAN_REMOVAL);
        \imagefilter($this->image, \IMG_FILTER_GAUSSIAN_BLUR);
    }
    protected function corrupt($hex) {
        for ($i=0; $i < 4; $i++) {
            $pos = rand(1024, strlen($hex) - (strlen($hex) % 8));
            $hex = substr($hex, 0, $pos) . '00000000' . substr($hex, $pos + 8);
        }
        return $hex;
    }
}
