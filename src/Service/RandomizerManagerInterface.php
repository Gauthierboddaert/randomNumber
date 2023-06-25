<?php

namespace App\Service;

interface RandomizerManagerInterface
{
    public function getRandomsNumbers(int $minValue, int $mawValue, int $row): array;
    public function getRandomNumber(int $minValue, int $mawValue): int;
}