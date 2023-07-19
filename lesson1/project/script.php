
<?php
$name = readline("Привет! Как тебя зовут? \n");
$age = readline("Сколько тебе лет? \n");
$question_1 = "Какая задача стоит перед вами сегодня?";
$question_2 = "Сколько примерно времени эта задача займет?";
$item_1 = readline($question_1);
$time_1 = readline($question_2);
$item_2 = readline($question_1);
$time_2 = readline($question_2);
$item_3 = readline($question_1);
$time_3 = readline($question_2);

$num = 1;
$sum = $time_1 + $time_2 + $time_3;

echo "Вас зовут {$name}, вам {$age} лет.
{$name}, сегодня у вас запланировано 3 приоритетных задачи на день:
- {$item_1} ({$time_1}ч)
- {$item_2} ({$time_2}ч)
- {$item_3} ({$time_3}ч)
Примерное время выполнения плана = {$sum}ч
";

