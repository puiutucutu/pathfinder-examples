# Example 2 - Dynamically Instantiating a Graph Network

This example shows demonstrates how to dynamically instantiate a Pathfinder graph network using an array of vertex pairs.

Given the following graph `$adjacencyListGraph`, stored as an adjacency list of doubly linked lists, the provided function `convertAdjacencyListGraphToUndirectedPathfinderGraph()` will convert it to an instance of a Pathfinder graph.

This is useful for instantiating a Pathfinder graph without having to manually write out `withVertex()` each time.

```php
<?php

/*

7 vertices, 7 edges

A: B C E
B: A D F
C: A G
E: A F
D: B
F: B E
G: C

*/

$vertexPairs = [
    ["A", "B"],
    ["A", "C"],
    ["A", "E"],
    ["B", "D"],
    ["B", "F"],
    ["F", "E"],
    ["C", "G"],
];

$adjacencyListGraph = buildAdjacencyListFromOrderedPairs($vertexPairs);

// this is an instance of \Stratadox\Pathfinder\Network
$undirectedPathfinderGraph = convertAdjacencyListGraphToUndirectedPathfinderGraph(
    $adjacencyListGraph
);
```
