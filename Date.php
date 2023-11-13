<?php
class Date {
private $year;
private $month;
private $day;

public function __construct($year, $month, $day) {
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

    public function compare(Date $c)
    {
        if ($this->year !== $c->getYear()) {
            return $this->year - $c->getYear();
        }
        if ($this->month !== $c->getMonth()) {
            return $this->month - $c->getMonth();
        }

        return $this->day - $c->getDay();
    }

    public function diff(Date $c)
    {
        $diff1 = strtotime($this->year . '-' . $this->month . '-' . $this->day);
        $diff2 = strtotime($c->getYear() . '-' . $c->getMonth() . '-' . $c->getDay());

        $diff = abs($diff1 - $diff2);

        return floor($diff / (60 * 60 * 24));
    }
    private function isValidDate($year, $month, $day)
    {
        return checkdate($month, $day, $year);
    }
    public function format($format) {
        $date = new DateTime("{$this->year}-{$this->month}-{$this->day}");
        return $date->format($format);
    }

}


$date1 = new Date(2017, 10, 10);
$date2 = new Date(2023, 11, 6);

if ($date1->getYear() and $date2->getYear()) {
    echo "Рік: " . $date1->getYear() . PHP_EOL;
    echo "Місяць: " . $date1->getMonth() . PHP_EOL;
    echo "День: " . $date1->getDay() . PHP_EOL;


    echo 'Різниця між днями: ' . $date1->diff($date2) . PHP_EOL;
    echo 'Результат порівняння: ' . $date1->compare($date2) . PHP_EOL;
} else {
    echo 'Недійсна дата';
}