<?php

namespace Hexlet\Phpunit\Tests;

use PHPUnit\Framework\TestCase;
use function Hexlet\Phpunit\Tdd\fill;

class TddTest extends TestCase
{
  private array $initialArr;

  protected function setUp(): void
  {
    $this->initialArr = [2, 4, 6, 8];
  }

  public function testFillPartialRange(): void
  {
    $arr = $this->initialArr;
    fill($arr, '*', 1, 3);
    $this->assertEquals([2, '*', '*', 8], $arr);

    $arr = $this->initialArr;
    fill($arr, '**', -4, -3);
    $this->assertEquals(['**', 4, 6, 8], $arr);

    $arr = $this->initialArr;
    fill($arr, '***', 2, -1);
    $this->assertEquals([2, 4, '***', 8], $arr);

    $arr = $this->initialArr;
    fill($arr, '****', -3, 2);
    $this->assertEquals([2, '****', 6, 8], $arr);
  }

  public function testFillFullArray(): void
  {
    $arr = $this->initialArr;
    fill($arr, '*');

    $this->assertEquals(['*', '*', '*', '*'], $arr);
  }

  public function testFillWithNoExistStartIndex(): void
  {
    $arr = $this->initialArr;
    fill($arr, '*', 4);
    fill($arr, '*', -5);
    fill($arr, '*', 4, 3);
    fill($arr, '*', 4, -3);
    fill($arr, '*', -5, 2);
    fill($arr, '*', -5, -2);

    $this->assertEquals([2, 4, 6, 8], $arr);
  }

  public function testFillWithNoExistEndIndex(): void
  {
    $arr = $this->initialArr;
    fill($arr, '*', 0, 10);
    $this->assertEquals(['*', '*', '*', '*'], $arr);

    $arr = $this->initialArr;
    fill($arr, '**', 0, -10);
    $this->assertEquals([2, 4, 6, 8], $arr);
  }
}
