# BodeTime
    A simple date/time class that creates a time object, converts it to
    different formats and can subtract two time objects.

## Usage
    NB: You must have PHP 8.0 installed.

To create a new time object instantiate the class like so:
```php
        $newTime = new \Nelwhix\BodeTime\BodeTime(2, 60, 0); // arguments are in the order (hours, seconds, minutes)
```

### Conversions
```php
    $newTime->convertToMinutes(); // Answer should be 121 minutes(s)
    $newTime->convertToSeconds(); // Answer should be 7260 seconds(s)
    $newTime->convertToHours(); // Answer should be 2.016666.. hour(s)
```

### Subtracting Time Objects
Let's say we create another time object
```php
    $secondTime = new Nelwhix\BodeTime\BodeTime(0, 0, 30);
```
You can subtract both time objects using:
```php
    $secondTime->subtractFrom($newTime); // this should return 1 hour(s) 31 minutes(s) 0 second(s)
```