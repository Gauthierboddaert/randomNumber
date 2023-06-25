<?php

namespace App\utils;

class ArrayUtils
{
    public static function getDuplicatesInarray(?array $array): array
    {
        $duplicates = [];
        $count = array_count_values($array);

        foreach ($count as $item => $element) {
            if($element > 1)
            {
                $duplicates [] = $item;
            }
        }

        return $duplicates;

    }
}