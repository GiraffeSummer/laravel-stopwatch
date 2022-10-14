# Stopwatch

Install: `composer require giraffesummer/stopwatch`

Time your functions, commands and tasks stopwatch style using this package.

It's build with Laravel (9) in mind, but it _might_ work without it.

It's super easy to get started, there's only 3 functions:

## Getting started

You can start using the stopwatch by creating a new instance of it.

import `GiraffeSummer\Stopwatch\Stopwatch`

```php
use GiraffeSummer\Stopwatch\Stopwatch;

$sw = new Stopwatch();
```

### Functions
The functions Start and Lap will return a formatted time string.
#### Start
 Start will return the starting time of the stopwatch.  
 This should always be: `00:00:00.000`
 usage:
 ```php
 $sw->start(); //00:00:00.000
 ```
#### Lap
 Lap is equivalent to the lap button on a stopwatch,   
 this will show the current elapsed time of the stopwatch,  
 since it was started or reset.
 usage:
 ```php
 $sw->lap(); //00:00:05.9547
 ```
#### Reset
Reset will reset the time back to 0.  
usage:
```php
$sw->reset();
```

### Example
here's an example of it all together.
```php
$sw = new Stopwatch();
echo $sw->start();
$sleep = rand(1, 5);
echo "sleep: " . $sleep;
sleep($sleep);
echo $sw->lap();
```

This will sleep for a random number of seconds between 1 and 5, and lap before and after to see how long it was.