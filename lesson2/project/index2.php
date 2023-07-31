<?php
$taskCount = (integer) readline("\nСколько задач запланировать?\n");
$timeCounter = 0;
$taskList = "";
const Question_1 = "Какая задача стоит перед вами сегодня?\n";
const Question_2 = "Сколько примерно времени эта задача займет?\n";

for ($i=1; $i <= $taskCount; $i++) {
    $task_name = readline(Question_1);
    $task_time = (float)readline(Question_2);

    $taskList .= "{$i}) {$task_name} ({$task_time}ч.)" . ($i==$taskCount?".":";") . "\n";
    $timeCounter += $task_time;
}

echo "Вами запланировано:
$taskList
Это займёт {$timeCounter}ч.\n\n
";