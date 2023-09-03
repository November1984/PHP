<?php

$reagardsArray = ['счастья', 'здоровья', 'дома', 'неба надо головой', 'взора'];
$epithetArray = ['крепкого', 'бесконечного', 'светлого', 'ясного', 'чистого',
                'бескрайнего', 'вечного', 'красивого', 'счастливого', 'космического'];

$selectedUserName = readline("Как тебя зовут?\n");
$congratulationsCount = 5;

for ($i = 0; $i < $congratulationsCount; $i++){
    if ($i > 0 && $i < $congratulationsCount-1) {
    $congratulationString = $congratulationString . ", ";
    }
    else {
        if ($i > $congratulationsCount - 2){
            $congratulationString = $congratulationString . " и ";
        }
    }
    $congratulationString = $congratulationString 
                    . $epithetArray[array_rand($epithetArray)]." "
                    . $reagardsArray[array_rand($reagardsArray)];
}
//$congratulationArray = implode(", ", $resArray);

echo "Дорогой друг, {$selectedUserName}! 
Поздравляю тебя с днём рождения!
Желаю тебе {$congratulationString}!
";
