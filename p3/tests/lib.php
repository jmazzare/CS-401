<?php

function expect_true($value, $message) {
    if (!$value) print("FAIL: " . $message . "\n");
}
