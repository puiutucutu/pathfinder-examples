# Example 2 - Dynamically Instantiating a Graph Network

This example shows how to dynamically instantiate a Pathfinder graph network using an array of vertex pairs.

Given the following graph represented as an adjacency list:

```
7 vertices, 7 edges

A: B C E
B: A D F
C: A G
E: A F
D: B
F: B E
G: C
```

## Directed Graph

A directed graph can be represented as:

```php
<?php

use Stratadox\Pathfinder\Graph\Builder\GraphNetwork;
use Stratadox\Pathfinder\Graph\Builder\WithEdge;
use Stratadox\Pathfinder\Graph\Builder\WithoutEdges;

$directedNetwork = GraphNetwork::create()
    ->withVertex("A", WithEdge::toTargets("B","C","E"))
    ->withVertex("B", WithEdge::toTargets("D","F"))
    ->withVertex("F", WithEdge::to("E"))
    ->withVertex("C", WithEdge::to("G"))
    ->withVertex("D", WithoutEdges::poorThing())
    ->withVertex("E", WithoutEdges::poorThing())
    ->withVertex("G", WithoutEdges::poorThing())
    ->make()
;
```

## Undirected Graph

An undirected graph can be represented as follows. 

The benefit of using an undirected graph with the Pathfinder library is that you can find the all-pairs shortest path to all other nodes form any source vertex. As an example, you can obtain the shortest paths from `E` to all other vertices using an undirected graph whereas you cannot do so in the directed graph example above.

Running any Pathfinder algorithms on the undirected graph (assuming the same amount of vertices) will be much slower of course since there will be more edges to traverse.

```php
<?php

use Stratadox\Pathfinder\Graph\Builder\GraphNetwork;
use Stratadox\Pathfinder\Graph\Builder\WithEdge;
use Stratadox\Pathfinder\Graph\Builder\WithoutEdges;

$undirectedNetwork = GraphNetwork::create()
    ->withVertex("A", WithEdge::toTargets("B","C","E"))
    ->withVertex("B", WithEdge::toTargets("A","D","F"))
    ->withVertex("C", WithEdge::toTargets("A","G"))
    ->withVertex("E", WithEdge::toTargets("A","F"))
    ->withVertex("D", WithEdge::to("B"))
    ->withVertex("F", WithEdge::toTargets("B","E"))
    ->withVertex("G", WithEdge::toTargets("C"))
    ->make()
;
```
