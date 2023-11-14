<?php

class Date
{
    private $year;
    private $month;
    private $day;

    public function __construct($year, $month, $day)
    {
        if ($this->isValidDate($year, $month, $day)) {
            $this->year = $year;
            $this->month = $month;
            $this->day = $day;
        } else {
            throw new InvalidArgumentException("Недійсна дата");
        }
    }



    public function getYear()
    {
        return $this->year;
    }

    public function getMonth()
    {
        return $this->month;
    }

    public function getDay()
    {
        return $this->day;
    }

    public function compare(Date $other)
    {
        if ($this->year !== $other->getYear()) {
            return $this->year - $other->getYear();
        }
        if ($this->month !== $other->getMonth()) {
            return $this->month - $other->getMonth();
        }

        return $this->day - $other->getDay();
    }

    public function diff(Date $item)
    {
        $diff1 = strtotime($this->year . '-' . $this->month . '-' . $this->day);
        $diff2 = strtotime($item->getYear() . '-' . $item->getMonth() . '-' . $item->getDay());

        $diff = abs($diff1 - $diff2);

        return floor($diff / (60 * 60 * 24));
    }

    public function format($format)
    {
        return sprintf($format, $this->year, $this->month, $this->day);
    }

    private function isValidDate($year, $month, $day)
    {
        return checkdate($month, $day, $year);
    }
}


