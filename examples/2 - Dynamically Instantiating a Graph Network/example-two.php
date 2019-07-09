<?php

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "bootstrap.php";
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "2 - Dynamically Instantiating a Graph Network/functions.php";

$adjacencyListGraph = buildAdjacencyListFromOrderedPairs($vertexPairs);
$undirectedPathfinderGraph = convertAdjacencyListGraphToUndirectedPathfinderGraph(
    $adjacencyListGraph
);

echo PHP_EOL;
heading("Adjacency List Graph");
print_r($adjacencyListGraph);

heading("Undirected Pathfinder Graph (dynamically generated from array of vertex pairs)");
print_r($undirectedPathfinderGraph);
