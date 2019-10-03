<?php
require_once __DIR__ . '/lib.php';
require_once __DIR__ . '/../2-rolling-average/lib.php';

function test_averages_1() {

    $users = [
        new User('don@joe.com'),
        new User('jane@doe.com'),
    ];

    $activity = [
        "don@joe.com" => [[22,3], [28,2], [17, 3]],
        "jane@doe.com" => [[23,4], [36,5], [23, 2]],
        "every@example.com" =>  [[31,2], [29,5], [21, 0]],
    ];

    $averages = rolling_averages($users, $activity);
    $results = [
        'don@joe.com' => ['0.10', '0.11'],
        'jane@doe.com' => ['0.15', '0.12'],
    ];
    expect_true($averages === $results, "averages do not match");
}

function test_averages_2() {

    $users = [];

    $activity = [
        "don@joe.com" => [[22,3], [28,2], [17, 3]],
        "jane@doe.com" => [[23,4], [36,5], [23, 2]],
        "every@example.com" =>  [[31,2], [29,5], [21, 0]],
    ];

    $averages = rolling_averages($users, $activity);
    $results = [];
    expect_true($averages === $results, "averages do not match");
}

test_averages_1();
test_averages_2();
