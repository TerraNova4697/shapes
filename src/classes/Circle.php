<?php

namespace src\classes;

use src\classes\Shape;
use InvalidArgumentException;

class Circle extends Shape
{
    private float $radius;

    public function __construct(float $radius)
    {
        if ($radius <= 0) {
            throw new InvalidArgumentException("Радиус круга должен быть больше нуля.");
        }
        $this->radius = $radius;
    }
    
    public function calculateArea(): float
    {
        if ($this->isAreaCached()) {
            return $this->getCachedArea();
        }
        $area = round(pi() * pow($this->radius, 2), 2);
        $this->cacheArea($area);
        return $area;
    }

    public function getInfo()
    {
        return "Круг с радиусом {$this->radius}\n";
    }

    public function setRadius(float $radius): void
    {
        $this->radius = $radius;
        $this->uncacheArea();
    }
}
