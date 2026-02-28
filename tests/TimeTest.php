<?php

namespace Hexlet\Phpunit\Tests;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use function Hexlet\Phpunit\Time\calculateRectangleArea;
use function Hexlet\Phpunit\Time\get;
use function Hexlet\Phpunit\Time\slice;
use function Hexlet\Phpunit\Time\indexOf;

class TimeTest extends TestCase
{

  #[DataProvider('rectangleProvider')]
  public function testRectangle(?int $expected, int $width, int $height): void
  {
    $this->assertEquals($expected, calculateRectangleArea($width, $height));
  }

  public static function rectangleProvider(): array
  {
    return [
      [12, 3, 4],
      [null, -2, 6],
      [42, 6, 7],
      [null, 3, -6],
      [null, -4, -7],
      [null, 0, 8],
      [72, 9, 8],
      [null, 5, 0],
      [null, 0, 0],
      [1, 1, 1]
    ];
  }

  public function testGet(): void
  {
    $arr = [3, 'yo', 3.14, 8, true];

    $this->assertEquals('yo', get($arr, 1));
    $this->assertEquals('hello', get($arr, 5, 'hello'));
    $this->assertEquals(null, get($arr, 6));
    $this->assertEquals(3.14, get($arr, 2, 'a'));
  }

  public function testSlice(): void
  {
    $arr = ['Hello', 'my', 'name', 'is', 'Mikhael'];

    $this->assertEquals(['Hello', 'my', 'name', 'is', 'Mikhael'], slice($arr));
    $this->assertEquals(['my', 'name'], slice($arr, 1, 3));
    $this->assertEquals(['my', 'name'], slice($arr, -4, -2));
    $this->assertEquals([], slice($arr, 7));
    $this->assertEquals(['Hello', 'my', 'name', 'is', 'Mikhael'], slice($arr, -7));
  }

  public function testIndexOf(): void
  {
    $arr = [1, '2', true, 1, 3, '4'];

    $this->assertEquals(2, indexOf($arr, true));
    $this->assertEquals(-1, indexOf($arr, '3'));
    $this->assertEquals(3, indexOf($arr, 1, -4));
    $this->assertEquals(-1, indexOf($arr, true, -3));
    $this->assertEquals(4, indexOf($arr, 3, -10));
    $this->assertEquals(-1, indexOf([], 'yo'));
  }
}
