<?php

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "bootstrap.php";

use Stratadox\Pathfinder\Graph\Builder\GraphNetwork;
use Stratadox\Pathfinder\Graph\Builder\WithEdge;
use Stratadox\Pathfinder\Graph\Builder\WithoutEdges;

$directedNetwork = GraphNetwork::create()
    ->withVertex("A", WithEdge::toTargets("B", "C", "E"))
    ->withVertex("B", WithEdge::toTargets("D", "F"))
    ->withVertex("F", WithEdge::to("E"))
    ->withVertex("C", WithEdge::to("G"))
    ->withVertex("D", WithoutEdges::poorThing())
    ->withVertex("E", WithoutEdges::poorThing())
    ->withVertex("G", WithoutEdges::poorThing())
    ->make()
;

$undirectedNetwork = GraphNetwork::create()
    ->withVertex("A", WithEdge::toTargets("B", "C", "E"))
    ->withVertex("B", WithEdge::toTargets("A", "D", "F"))
    ->withVertex("C", WithEdge::toTargets("A", "G"))
    ->withVertex("E", WithEdge::toTargets("A", "F"))
    ->withVertex("D", WithEdge::to("B"))
    ->withVertex("F", WithEdge::toTargets("B", "E"))
    ->withVertex("G", WithEdge::toTargets("C"))
    ->make()
;

echo PHP_EOL;
heading("Directed Pathfinder Graph");
print_r($directedNetwork);

heading("Undirected Pathfinder Graph");
print_r($undirectedNetwork);
