<?php

require 'vendor/autoload.php';

use Nelwhix\BodeTime\BodeTime;
use function PHPUnit\Framework\assertEquals;

test("new time objects can be created", function () {
    $newTime = new BodeTime(1, 0, 0);

    expect($newTime)->toBeInstanceOf(BodeTime::class);
});

test("time can be converted to seconds", function ($hours, $seconds, $minutes, $expectation) {
    $newTime = new BodeTime($hours, $seconds, $minutes);
    assertEquals($expectation, $newTime->convertToSeconds());
})->with([
    [1, 0, 0, 3600],
    [0, 0, 35, 2100],
    [2, 0, 13, 7980],
    [1, 15, 14, 4455]
]);

test("time can be converted to minutes", function ($hours, $seconds, $minutes, $expectation) {
    $newTime = new BodeTime($hours, $seconds, $minutes);
    assertEquals($expectation, $newTime->convertToMinutes());
})->with([
    [1, 0, 0, 60],
    [0, 0, 35, 35],
    [2, 0, 13, 133],
    [1, 15, 14, 74.25]
]);

test("time can be converted to hours", function ($hours, $seconds, $minutes, $expectation) {
    $newTime = new BodeTime($hours, $seconds, $minutes);
    assertEquals($expectation, round($newTime->convertToHours(), 4));
})->with([
    [1, 0, 0, 1],
    [0, 0, 35, 0.5833],
    [2, 0, 13, 2.2167],
    [1, 15, 14, 1.2375],
]);

test("two time objects can be subtracted", function (BodeTime $time1, BodeTime $time2, $expectation) {
   assertEquals($expectation, $time2->subtractFrom($time1));
})->with([
    [new BodeTime(2, 60, 0), new BodeTime(0, 0, 30),
        "1 hour(s) 31 minute(s) 0 second(s)"],
    [new BodeTime(2, 60, 0), new BodeTime(1, 20, 30),
        "0 hour(s) 30 minute(s) 40 second(s)"],
]);

