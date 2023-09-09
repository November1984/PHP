<?php

function itemSearch(string $item, array $arrItems): bool 
{
    foreach ($arrItems as $value) {
        if (is_array($value) ) 
        {
           if (itemSearch($item, $value))
           return true; 

        }
        else{
            if ($value == $item) {
                // echo "$value == $item".PHP_EOL;
                return true;
            }
        }
    }
    return false;
}


$box = [
    [
        0 => 'Тетрадь',
        1 => 'Книга',
        2 => 'Настольная игра',
        3 => [
                'Настольная игра',
                'Настольная игра', 
            ],
        4 => [
                [
                'Ноутбук',
                'Зарядное устройство' 
                ],
                [
                'Компьютерная мышь',
                'Набор проводов',
                    [
                    'Фотография',
                    'Картина' 
                    ]
                ], 
                ['Инструкция',
                    [
                    'Ключ' 
                    ]
                ] 
            ]
    ], 
    [
    0 => 'Пакет кошачьего корма', 
    1 => [
        'Музыкальный плеер',
        'Книга' 
        ]
    ] 
];

echo itemSearch('Книга', $box) ? "True" : "False";
