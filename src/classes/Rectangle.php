<?php

namespace src\classes;

use src\classes\Shape;
use InvalidArgumentException;


/**
 * Represents a rectangle and can calculate its area.
 */
class Rectangle extends Shape
{
    /**
     * @var float The width of the rectangle.
     */
    private float $width;
    /**
     * @var float The length of the rectangle.
     */
    private float $length;


    /**
     * Rectangle constructor.
     *
     * @param float $length The length of the rectangle.
     * @param float $width The width of the rectangle.
     */
    public function __construct(float $width, float $length)
    {
        if ($length <= 0 || $width <= 0) {
            throw new InvalidArgumentException("Длина и ширина прямоугольника должны быть больше нуля.");
        }
        $this->width = $width;
        $this->length = $length;
    }

    /**
     * Calculate the area of the rectangle if not in cache already.
     *
     * @return float The calculated area.
     */
    public function calculateArea(): float 
    {
        if ($this->isAreaCached()){
            return $this->getCachedArea();
        }
        $area = round($this->length * $this->width, 2);
        $this->cacheArea($area);
        return $area;
    }

    /**
     * Represent information about the rectangle.
     *
     * @return string The information about the rectangle.
     */
    public function getInfo()
    {
        return "Прямоугольник с длиной {$this->length} и шириной {$this->width}\n";
    }

    /**
     * Set the new width for the rectangle.
     * 
     * @param float $width The width of the rectangle.
     */    
    public function setWidth(float $width): void
    {
        if ($width <= 0) {
            throw new InvalidArgumentException("Длина и ширина прямоугольника должны быть больше нуля.");
        }
        $this->uncacheArea();
        $this->width = $width;
    }

    /**
     * Set the new length for the rectangle.
     * 
     * @param float $length The width of the rectangle.
     */  
    public function setLength(float $length): void
    {
        if ($length <= 0) {
            throw new InvalidArgumentException("Длина и ширина прямоугольника должны быть больше нуля.");
        }
        $this->uncacheArea();
        $this->length = $length;
    }
}
