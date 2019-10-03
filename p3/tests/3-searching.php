<?php
require_once __DIR__ . '/lib.php';
require_once __DIR__ . '/../3-searching/lib.php';


function test_search_1() {
    $results = search_directory(__DIR__ . '/../3-searching/data.csv', 'don');
    $expected = ['don@joe.com'];
    expect_true($expected === $results, "search for 'don' results do not match");
}
function test_search_2() {
    $results = search_directory(__DIR__ . '/../3-searching/data.csv', 'enrolled');
    $expected = [];
    expect_true($expected === $results, "search for 'enrolled' results do not match");
}
function test_search_3() {
    $results = search_directory(__DIR__ . '/../3-searching/data.csv', 'edu');
    $expected = [
        's1@example.edu',
        's2@example.edu',
        's3@example.edu',
    ];
    expect_true($expected === $results, "search for 'edu' results do not match");
}


test_search_1();
test_search_2();
test_search_3();
