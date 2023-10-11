<?php

namespace src\classes;

use src\classes\Shape;
use InvalidArgumentException;


class Square extends Shape
{
    private float $side;

    public function __construct(float $side)
    {
        if ($side <= 0) {
            throw new InvalidArgumentException("Длина стороны квадрата должна быть больше нуля.");
        }
        $this->side = $side;
    }

    public function calculateArea(): float
    {
        if ($this->isAreaCached()) {
            return $this->getCachedArea();
        }
        $area = round(pow($this->side, 2), 2);
        $this->cacheArea($area);
        return $area;
    }

    public function getInfo()
    {
        return "Квадрат со стороной {$this->side}\n";
    }

    public function setSide(float $side): void
    {
        if ($side <= 0) {
            throw new InvalidArgumentException("Длина стороны квадрата должна быть больше нуля.");
        }
        $this->side = $side;
        $this->uncacheArea();
    }
}
