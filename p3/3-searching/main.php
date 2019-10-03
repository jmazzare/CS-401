<?php
require __DIR__ .'/lib.php';
$results = search_directory(__DIR__ . '/data.csv', 'don');
print_r($results);


/* Prints:
 * >

Array
(
    [0] => don@joe.com
)

 */
