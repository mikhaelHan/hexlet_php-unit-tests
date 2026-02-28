<?php

namespace Hexlet\Phpunit\Tests;

use PHPUnit\Framework\TestCase;
use function Hexlet\Phpunit\Utils\reverseString;

class UtilsTest extends TestCase
{
  public function testReverse(): void
  {
    $this->assertEquals('', reverseString(''));
    $this->assertEquals('olleh', reverseString('hello'));
  }

  private function getFixtureFullPath(string $fixtureName): string
  {
    $parts = [__DIR__, 'fixtures', $fixtureName];
    return realpath(implode('/', $parts));
  }

  public function testReverseLongString(): void
  {
    $beforePath = $this->getFixtureFullPath('before.txt');
    $input = file_get_contents($beforePath);

    $afterPath = $this->getFixtureFullPath('after.txt');
    $expected = file_get_contents($afterPath);

    $actual = reverseString($input);

    $this->assertEquals($expected, $actual);
  }
}

// --------------------for Arrays-------------------- //
// Проверяет количество элементов
//    $this->assertCount(0, ['foo']);

// Ожидает пустой массив
//    $this->assertEmpty(['foo']); // или assertNotEmpty

// При сравнении приводит к одному виду в случае массивов сортирует их
//    $this->assertEqualsCanonicalizing($arr1, $arr2);

// Проверяет, что элемент слева входит в массив справа
//    $this->assertContains(4, [1, 2, 3]);

// ------------------for Strings------------------ //
// Проверяет окончание строки
//    $this->assertStringEndsWith('suffix', 'foo');

// Проверяет, что строка соответствует формату варианты форматирования указаны в документации PHPUnit
//    $this->assertStringMatchesFormat('%i', 'foo');

// Проверяет наличие подстроки в строке
//    $this->assertStringContainsString('foo', 'bar');

// ------------------------Output----------------------- //
// Вызывается какой-то код, который печатает на экран
//    echo 'some output';
//    $this->expectOutputString('some output');

class SetFunctionTest extends TestCase
{
  public function testDoesNotOverwriteExistingNestedArrays(): void
  {
    // $coll = ['a' => ['b' => ['c' => 3, 'd' => 7]]];
    // set($coll, ['a', 'b', 'c'], 4);
    // $this->assertSame(7, $coll['a']['b']['d'], 'Existing keys must not be removed');
  }
}
