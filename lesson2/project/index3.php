<?php
do {
    $number = (integer)readline("Укажите число, сударь: ");
} while ($number <= 0);

  //  $finger = $number % 9 + (int)($number / 9) % 10;
    $finger = $number % 8;

    switch (true) {
        case $finger == 1  :
            print "Большой";
            break;
        case $finger == 2 or $finger == 0 :
            print "Указательный";
            break;
        case $finger == 3 or $finger == 7 :
            print "Средний";
            break;
        case $finger == 4 or $finger == 6 :
            print "Безымянный";
            break;
        case $finger == 5 :
            print "Мизинец";
            break;
    }
    print "\n";
