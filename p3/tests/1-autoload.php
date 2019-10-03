<?php
require_once __DIR__ . '/lib.php';

function test_spl_register() {
    $registered = spl_autoload_functions();
    expect_true($registered === false, "there should be no autoloaders at start");
    include_once __DIR__ . '/../1-autoload/autoload.php';
    $registered = spl_autoload_functions();
    expect_true(count($registered) === 1, "there should be 1 autoloader registered");
}

function test_elephant() {
    $mascot = new \languages\php\Mascot();
    try {
        $output = "$mascot";
        expect_true($output === \languages\php\Mascot::ASCII, "expected an ASCII elephant");
    } catch (Error $e) {
        expect_true(false, "expected to convert the Mascot object into a string");
    }
}

test_spl_register();
test_elephant();
