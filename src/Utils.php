<?php

namespace Hexlet\Phpunit\Utils;

// Эта функция переворачивает переданную строку
function reverseString(string $string): string
{
  return implode(array_reverse(str_split($string)));
}

function toHtmlList($filepath): string
{
  $parsers = [
    'json' => fn($content) => json_decode($content, true),
    'csv' => fn($content) => str_getcsv($content, escape: '\\')
  ];

  $content = file_get_contents($filepath);
  $type = pathinfo($filepath)['extension'];
  $items = $parsers[$type]($content);
  $list = array_map(fn($item) => "<li>{$item}</li>", $items);
  return "<ul>\n" . implode("\n", $list) . "\n</ul>";
}
