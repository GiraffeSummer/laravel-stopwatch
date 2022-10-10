<?php

namespace GiraffeSummer\Stopwatch;

use Carbon\Carbon;

/**
 * Keep track of duration of functions, like a stopwatch
 */
class Stopwatch
{
    private $start = null;
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
        $this->start = Carbon::now();
    }

    /**
     * Return the starting time of the stopwatch (basically always 00:00:00)
     *
     * @return string timestring of the start time (00:00:00)
     */
    public function start()
    {
        return $this->start->diff($this->start)->format('%H:%I:%S');
    }

    /**
     * Lap the stopwatch timer, this will return a time string representing the elapsed time.
     *
     * @return string elapsed time since the stopwatch was started
     */
    public function lap()
    {
        return $this->start->diff(Carbon::now())->format('%H:%I:%S');
    }
}
