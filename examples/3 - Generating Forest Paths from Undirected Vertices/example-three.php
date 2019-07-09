<?php

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "bootstrap.php";
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "2 - Dynamically Instantiating a Graph Network/functions.php";

use Stratadox\Pathfinder\Graph\Builder\GraphNetwork;
use Stratadox\Pathfinder\Graph\Builder\WithEdge;
use Stratadox\Pathfinder\Graph\Builder\WithoutEdges;
use Stratadox\Pathfinder\FloydWarshallIndexer;
use Stratadox\Pathfinder\MultiDijkstraPathfinder;
use Stratadox\Pathfinder\StaticPathfinder;

$adjacencyListGraph = buildAdjacencyListFromOrderedPairs($vertexPairs);
$undirectedNetwork = convertAdjacencyListGraphToUndirectedPathfinderGraph(
    $adjacencyListGraph
);
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

// swap network here
$network = $undirectedNetwork;

// creates an index of all possible paths in the graph
$indexer = FloydWarshallIndexer::operatingIn($network);
$index = $indexer->allShortestPaths();
// uses index for speed; for use at run time
$pathFinder = StaticPathfinder::using($index, $network);


echo PHP_EOL;
heading("Index (forest)");
print_r($index);

heading("Shortest paths to all vertices from A");
print_r($pathFinder->from("A"));

heading("Shortest paths to all vertices from E");
print_r($pathFinder->from("E"));

heading("Shortest path from A → E");
print_r($pathFinder->between("A", "E"));

heading("Shortest path from E → A");
print_r($pathFinder->between("E", "A"));
