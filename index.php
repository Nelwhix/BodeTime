<?php
require 'vendor/autoload.php';

use Nelwhix\BodeTime\BodeTime;

$newTime = new BodeTime(2, 60, 0);
$nelsonTime = new BodeTime(0, 0, 30);

echo $newTime->convertToHours();
