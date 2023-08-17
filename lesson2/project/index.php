<?php
$question = "\nВ каком году произошло крещение Руси?
a. 810;
b. 990;
c. 740;
d. нет правильного ответа;
";

while (true) {
    $answer = (string) readline($question);
    switch ($answer) {
        case "d":
            break(2);
        case "a":
        case "b":
        case "c":
            echo "\nОтвет не верен\n";
            break(2);
        default:
            echo "\nА? Не понял ответа...\n";
    }
}
echo "Досвидания!";

do {
    $answer = (string) readline($question);
    if ($answer == "d") {
        echo "Угадал!";
        break;
    }
    echo "Не угадал!";
    break;
} while (true);