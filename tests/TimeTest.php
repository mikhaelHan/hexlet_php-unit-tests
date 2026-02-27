<?php

namespace Hexlet\Phpunit\Tests;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use function Hexlet\Phpunit\Time\calculateRectangleArea;

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
}
