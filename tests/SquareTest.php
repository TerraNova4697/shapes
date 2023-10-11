<?php declare(strict_types=1);

use src\classes\Square;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;


final class SquareTest extends TestCase
{
    public function testCalculateArea(): void
    {
        $square = new Square(6);
        $area = $square->calculateArea();
        $this->assertEquals(pow(6, 2), $area);
    }

    public function testCacheUpdatesAfterSquareModified(): void
    {
        $square = new Square(10);
        $area = $square->calculateArea();
        $square->setSide(15);
        $this->assertFalse($area === $square->calculateArea());
    }

    public function testCanUpdateSide(): void
    {
        $square = new Square(10);
        $square->calculateArea();
        $square->setSide(15);
        $this->assertEquals(round(pow(15, 2), 2), $square->calculateArea());
    }

    public function testExcThrownWhenInitWithNegativeValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $circle = new Square(-1);
    }

    public function testExcThrownWhenModifySideWithNegativeValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $circle = new Square(10);
        $circle->setSide(-1);
    }
}
