<?php

namespace GiraffeSummer\Stopwatch;

use Carbon\Carbon;

/**
 * Keep track of duration of functions, like a stopwatch
 */
class Stopwatch
{
    private $start = null;
    private $format = '';
    private $laps = 0;

    private $last = null;

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
        $this->setFormat();
        $this->reset();
    }

    /**
     * Reset the stopwatch timer back to 00:00:00
     * and the lap count back to 0
     *
     * @return void
     */
    public function reset()
    {
        $this->laps = 0;
        $this->start = $this->stamp();
        $this->last = $this->start;
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
        $this->laps++;
        $stamp = $this->stamp();
        $this->last = $stamp;
        return $this->start->diff($stamp)->format($this->format);
    }

    /**
     * shows the difference between the last time and now
     *
     * @return string
     */
    public function gap(): string
    {
        $stamp = $this->stamp();
        $diff = $this->last->diff($stamp)->format($this->format);
        $this->last = $stamp;
        return $diff;
    }

    /**
     * This will return the number of laps elapsed
     *
     * @return int
     */
    public function lapCount()
    {
        return $this->laps;
    }


    /**
     * Set a custom format option, no param for default ('%H:%I:%S.%f')
     *
     * @param string $format
     * @return self
     */
    public function setFormat($format = '%H:%I:%S.%f{2}'): self
    {
        $this->format = $format;
        return $this;
    }

    /*

    // alternate version, for reference
        /**
     * Format the date
     *
     * @param Carbon $stamp
     * @return return formatted date string
     */
    /*
    private function format(Carbon $stamp)
    {
        $diff = $this->start->diff($stamp);

        return $diff->format($this->format);
    }

   public function start()
    {
        return $this->format($this->start);
    }


    public function lap()
    {
        return $this->format($this->stamp());
    }*/
}
