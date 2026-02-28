<?php

namespace Hexlet\Phpunit\Time;

function calculateRectangleArea(int $length, int $width): ?int
{
  if ($length <= 0 || $width <= 0) {
    return null;
  }
  return $length * $width;
}

function get(array $coll, int $index, mixed $defaultValue = null): mixed
{
  return array_key_exists($index, $coll) ? $coll[$index] : $defaultValue;
}


function indexOf(array $coll, mixed $value, int $fromIndex = 0): int
{
  $length = count($coll);

  if ($length === 0) {
    return -1;
  }

  $index = $fromIndex;

  if ($index < 0) {
    if (-$index > $length) {
      $index = 0;
    } else {
      $index = $length + $index;
    }
  }

  for ($i = $index; $i < $length; $i++) {
    if ($coll[$i] === $value) {
      return $i;
    }
  }
  return -1;
}

function slice(array $coll, int $start = 0, ?int $end = null): array
{
  $length = count($coll);
  $end = $end ?? $length;
  $normalisedStart = $start;

  if ($normalisedStart < 0) {
    $normalisedStart = -$normalisedStart > $length ? 0 : $normalisedStart + $length;
  }

  $normalisedEnd = $end > $length ? $length : $end;

  if ($normalisedEnd < 0) {
    $normalisedEnd += $length;
  }

  $result = [];

  for ($i = $normalisedStart; $i < $normalisedEnd; $i++) {
    $result[] = $coll[$i];
  }

  return $result;
}

