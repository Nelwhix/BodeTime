<?php

namespace Nelwhix\BodeTime;

class BodeTime
{
    public function __construct(private Int $hours, private Int $seconds, private Int $minutes) {
    }

    public function convertToSeconds(): float {
        return $this->seconds + ($this->hours * 60 * 60) + ($this->minutes * 60);
    }

    public function convertToMinutes(): string
    {
        return $this->minutes + ($this->hours * 60) + ($this->seconds / 60);
    }

    public function convertToHours(): float {
        return $this->hours + ($this->minutes / 60) + ($this->seconds / 3600);
    }

    public function getSeconds(): int {
        return $this->seconds;
    }

    public function getMinutes(): int {
        return $this->minutes;
    }

    public function getHours(): int {
        return $this->hours;
    }

    public function subtractFrom(BodeTime $bodeTime): string {
        $time1 = $bodeTime->getSeconds() + ($bodeTime->getMinutes() * 60) + ($bodeTime->getHours() * 3600);
        $time2 = $this->getSeconds() + ($this->getMinutes() * 60) + ($this->getHours() * 3600);

        $difference = $time1 - $time2;
        $differenceInHours = floor($difference / 3600);
        $differenceInMinutes = floor(($difference % 3600) / 60);


        return $differenceInHours . " hour(s)" . " " . $differenceInMinutes . " minute(s)" . " " . ($difference % 60) . " second(s)";
    }
}