<?php

require dirname(__DIR__) . DIRECTORY_SEPARATOR . "vendor/autoload.php";

/**
 * @param string $x
 */
function heading($x)
{
    $dash = "-";
    $dashes = str_repeat($dash, strlen($x));
    echo PHP_EOL;
    echo "{$dashes}", PHP_EOL;
    echo "{$x}", PHP_EOL;
    echo "{$dashes}", PHP_EOL;
    echo PHP_EOL;
}

$vertexPairs = [
    ["A", "B"],
    ["A", "C"],
    ["A", "E"],
    ["B", "D"],
    ["B", "F"],
    ["F", "E"],
    ["C", "G"],
];
