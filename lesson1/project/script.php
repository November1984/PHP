<?php
$name = readline("Привет! Как тебя зовут? \n");
$age = readline("Сколько тебе лет? \n");

const Question_1 = "Какая задача стоит перед вами сегодня?";
const Question_2 = "Сколько примерно времени эта задача займет?";

$item_1 = readline(Question_1);
$time_1 = (integer)readline(Question_2);
$item_2 = readline(Question_1);
$time_2 = (integer)readline(Question_2);
$item_3 = readline(Question_1);
$time_3 = (integer)readline(Question_2);

$num = 1;
$sum = $time_1 + $time_2 + $time_3;

echo "Вас зовут {$name}, вам {$age} лет.
{$name}, сегодня у вас запланировано 3 приоритетных задачи на день:
- {$item_1} ({$time_1}ч)
- {$item_2} ({$time_2}ч)
- {$item_3} ({$time_3}ч)
Примерное время выполнения плана = {$sum}ч
";