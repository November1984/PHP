<?php

class Time
{
    static function getTime(): string 
    {
        $tz = new DateTimeZone("Europe/Moscow");
        $date = new DateTime("now", $tz);
        return (string) $date->format('Y-m-d H:i:s');
    }
}