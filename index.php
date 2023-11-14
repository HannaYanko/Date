<?php

require 'Date.php';

$date1 = new Date(2017, 10, 10);
$date2 = new Date(2023, 11, 6);

if ($date1->getYear() && $date2->getYear()) {
    echo "Рік: " . $date1->getYear() . PHP_EOL;
    echo "Місяць: " . $date1->getMonth() . PHP_EOL;
    echo "День: " . $date1->getDay() . PHP_EOL;

    echo 'Різниця між днями: ' . $date1->diff($date2) . PHP_EOL;
    echo 'Результат порівняння: ' . $date1->compare($date2) . PHP_EOL;
} else {
    echo 'Недійсна дата';
}
