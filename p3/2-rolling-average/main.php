<?php

require_once __DIR__ . '/lib.php';

$users = [
    new User('don@joe.com'),
    new User('jane@doe.com'),
];

$activity = [
    "don@joe.com" => [[22,3], [28,2], [17, 3]],
    "jane@doe.com" => [[23,4], [36,5], [23, 2]],
    "every@example.com" =>  [[31,2], [29,5], [21, 0]],
];

print_r(rolling_averages($users, $activity));

/**
 * Running the code above should print:
 * >

Array
(
    [don@joe.com] => Array
        (
            [0] => 0.10
            [1] => 0.11
        )

    [jane@doe.com] => Array
        (
            [0] => 0.15
            [1] => 0.12
        )
)

 */
