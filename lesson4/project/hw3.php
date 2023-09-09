<?php

function itemSearch(string $item, array $arrItems): bool 
{
    $iFind = false;
    foreach ($arrItems as $value) {
        if (is_array($value) ) 
        {
           if (itemSearch($item, $value))
           $iFind = true; 

        }
        else{
            if ($value == $item) {
                echo "$value == $item".PHP_EOL;
                $iFind = true;
            }
        }
    }
    return ($iFind) ? true : false;
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

echo itemSearch('Ключ', $box) ? "True" : "False";
