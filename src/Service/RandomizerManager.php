<?php

namespace App\Service;

class RandomizerManager implements RandomizerManagerInterface
{

    public function getRandomNumber(int $minValue, int $maxValue): int
    {
        return rand($minValue, $maxValue);
    }

    public function getRandomsNumbers(int $minValue, int $maxValue, int $row): array
    {
        $numbers = [];

        for($i = 0; $i < $row; $i++)
        {
           $numbers[] = $this->getRandomNumber($minValue, $maxValue);
        }
        return $numbers;
    }
}