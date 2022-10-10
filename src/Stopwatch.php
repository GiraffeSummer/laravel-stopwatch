<?php

namespace GiraffeSummer\Stopwatch;

use Carbon\Carbon;

/**
 * Keep track of duration of functions, like a stopwatch
 */
class Stopwatch
{
    private $start = null;
    private $format = '%H:%I:%S';

    /**
     * Function that returns now as a time, this is to make sure we always get the same format
     *
     * @return Carbon
     */
    private function stamp()
    {
        return Carbon::now();
    }

    /**
     * Create a new Stopwatch instance
     * this will also start the stopwatch timer
     */
    function __construct()
    {
        $this->reset();
    }

    /**
     * Reset the stopwatch timer back to 00:00:00
     *
     * @return void
     */
    public function reset()
    {
        $this->start = $this->stamp();
    }

    /**
     * Return the starting time of the stopwatch (basically always 00:00:00)
     *
     * @return string timestring of the start time (00:00:00)
     */
    public function start()
    {
        return $this->start->diff($this->start)->format($this->format);
    }

    /**
     * Lap the stopwatch timer, this will return a time string representing the elapsed time.
     *
     * @return string elapsed time since the stopwatch was started
     */
    public function lap()
    {
        return $this->start->diff($this->stamp())->format($this->format);
    }
}
