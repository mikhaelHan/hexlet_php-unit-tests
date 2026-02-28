<?php

namespace Hexlet\Phpunit\Tdd;

function fill(array &$coll, mixed $value, int $start = 0, ?int $end = null): void
{
    $length = count($coll);

    if ($start < 0) {
        $start = $length + $start;
    }

    if ($start < 0 || $start >= $length) {
        return;
    }

    if ($end === null || $end > $length) {
        $end = $length;
    } elseif ($end < 0) {
        $end = max(0, $length + $end);
    }

    for ($i = $start; $i < $end; $i++) {
        $coll[$i] = $value;
    }
}
