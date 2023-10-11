<?php

namespace src\classes;

abstract class Shape
{
    private float $cachedArea;
    
    abstract public function calculateArea();
    abstract public function getInfo();

    protected function isAreaCached(): bool
    {
        return isset($this->cachedArea);
    }

    protected function getCachedArea(): float
    {
        return $this->cachedArea;
    }
    
    protected function cacheArea(float $area): void
    {
        $this->cachedArea = $area;
    }

    protected function uncacheArea(): void
    {
        unset($this->cachedArea);
    }

    public function printArea(): void
    {
        echo 'Площадь: ' . $this->calculateArea() . "см.\n";
    }
}
