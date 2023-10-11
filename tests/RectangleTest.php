<?php declare(strict_types=1);

use src\classes\Rectangle;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;


final class RectangleTest extends TestCase
{
    public function testCalculateArea(): void
    {
        $rect = new Rectangle(6, 7);
        $area = $rect->calculateArea();
        $this->assertEquals(round(6 * 7, 2), $area);
    }

    public function testCacheUpdatesAfterRectWidthModified(): void
    {
        $rect = new Rectangle(10, 15);
        $area = $rect->calculateArea();
        $rect->setWidth(15);
        $this->assertFalse($area === $rect->calculateArea());
    }

    public function testCacheUpdatesAfterRectLengthhModified(): void
    {
        $rect = new Rectangle(10, 15);
        $area = $rect->calculateArea();
        $rect->setLength(18);
        $this->assertFalse($area === $rect->calculateArea());
    }

    public function testCanUpdateWidth(): void
    {
        $rect = new Rectangle(10, 15);
        $rect->calculateArea();
        $rect->setWidth(15);
        $this->assertEquals(round(15 * 15, 2), $rect->calculateArea());
    }

    public function testCanUpdateLength(): void
    {
        $rect = new Rectangle(10, 15);
        $rect->calculateArea();
        $rect->setLength(20);
        $this->assertEquals(round(10 * 20, 2), $rect->calculateArea());
    }

    public function testExcThrownWhenInitWithNegativeWidth(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $circle = new Rectangle(-1, 4);
    }

    public function testExcThrownWhenInitWithNegativeLength(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $circle = new Rectangle(1, -4);
    }

    public function testExcThrownWhenModifyWidthWithNegativeValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $circle = new Rectangle(10, 20);
        $circle->setWidth(-1);
    }

    public function testExcThrownWhenModifyLengthhWithNegativeValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $circle = new Rectangle(10, 20);
        $circle->setLength(-1);
    }
}