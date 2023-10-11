<?php

namespace src\classes;

use src\classes\Shape;
use InvalidArgumentException;

class Rectangle extends Shape
{
    private float $width;
    private float $length;

    public function __construct(float $width, float $length)
    {
        if ($length <= 0 || $width <= 0) {
            throw new InvalidArgumentException("Длина и ширина прямоугольника должны быть больше нуля.");
        }
        $this->width = $width;
        $this->length = $length;
    }

    public function calculateArea(): float 
    {
        if ($this->isAreaCached()){
            return $this->getCachedArea();
        }
        $area = round($this->length * $this->width, 2);
        $this->cacheArea($area);
        return $area;
    }

    public function getInfo()
    {
        return "Прямоугольник с длиной {$this->length} и шириной {$this->width}\n";
    }

    public function setWidth(float $width): void
    {
        $this->uncacheArea();
        $this->width = $width;
    }

    public function setLength(float $length): void
    {
        $this->uncacheArea();
        $this->length = $length;
    }
}
