<?php

$students = [
    'Группа1' => [
        'Иван Первый' => 5,
        'Павел Второй' => 4,
        'Андрей Третий' => 3,
        'Кирилл Четвёртый' => 2,
        'Евгений Пятый' => 1,
        'Александр Шестой' => 4
    ],
    'Группа2' => [
        'Иван Седьмой' => 5,
        'Павел Восьмой' => 4,
        'Андрей Девятый' => 5,
        'Кирилл Десятый' => 4,
        'Евгений Одиннадцатый' => 5,
        'Александр Двенадцатый' => 2
    ],
    'Группа3' => [
        'Иван Тринадцатый' => 4,
        'Павел Четырнадцатый' => 4,
        'Андрей Пятнадцатый' => 3,
        'Кирилл Шестнадцатый' => 2,
        'Евгений Семнадцатый' => 5,
        'Александр Восемнадцатый' => 4
    ],
];

foreach ($students as $groupName => $studentName) {
    $avrMarks [$groupName] = 0;
    foreach ($studentName as $name => $studentMark) {
        $avrMarks [$groupName] += $studentMark / count($studentName);
        if ($studentMark < 3) {
            $laggingStudent[$groupName][] = $name . " оценка {$studentMark}";
        }

    }
}
sort($avrMarks);

echo " \nСреднее количество баллов для лучшей группы '{$groupName}' - 
{$avrMarks[count($avrMarks)-1]}.\n\n";
echo "Следующим студентам необходимо пройти дополнительное обучение:\n";
print_r($laggingStudent);
