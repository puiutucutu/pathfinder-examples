<?php

use Stratadox\Pathfinder\Graph\Builder\GraphNetwork;
use Stratadox\Pathfinder\Graph\Builder\WithEdge;

/**
 * @param <string, SplDoublyLinkedList>[]  $adjacencyList
 * @param string $v
 *
 * @return string[]
 */
function getAdjacentVertices(array $adjacencyList, $v)
{
    if (!(isset($adjacencyList[$v]) || array_key_exists($v, $adjacencyList))) {
        return [];
    }

    $vs = [];
    foreach ($adjacencyList[$v] as $vertex) {
        $vs[] = $vertex;
    }

    return $vs;
}

/**
 * @param string[] $vertexPairs
 *
 * @return <string, SplDoublyLinkedList>[]
 */
function buildAdjacencyListFromOrderedPairs(array $vertexPairs)
{
    $adjacencyList = [];

    $vertices = [];
    foreach ($vertexPairs as $pair) {
        $vertices[] = $pair[0];
        $vertices[] = $pair[1];
    }

    // create a linked list for each vertex if one has not yet been created
    $uniqueVertices = array_unique($vertices);
    foreach ($uniqueVertices as $v) {
        if (!(isset($adjacencyList[$v]) || array_key_exists($v, $adjacencyList))) {
            $adjacencyList[$v] = new \SplDoublyLinkedList();
        }
    }

    // populate each vertex's adjacency list
    foreach ($vertexPairs as $pair) {
        $u = $pair[0];
        $v = $pair[1];

        if (
            !in_array($v, getAdjacentVertices($adjacencyList, $u)) &&
            !in_array($u, getAdjacentVertices($adjacencyList, $v))
        ) {
            $adjacencyList[$u]->push($v);
            $adjacencyList[$v]->push($u);
        }
    }

    return $adjacencyList;
}

/**
 * @param <string, SplDoublyLinkedList>[] $adjacencyList
 *
 * @return \Stratadox\Pathfinder\Network
 */
function convertAdjacencyListGraphToUndirectedPathfinderGraph(array $adjacencyList)
{
    $network = GraphNetwork::create();
    foreach ($adjacencyList as $vertexId => $adjacentVerticesDoublyLinkedList)
    {
        $adjacentVertices = getAdjacentVertices($adjacencyList, $vertexId);
        $adjacentVerticesCount = count($adjacentVertices);
        $head = $adjacentVertices[0];
        if ($adjacentVerticesCount === 1) {
            $network = $network->withVertex($vertexId, WithEdge::to($head));
        } elseif ($adjacentVerticesCount >= 2) {
            $tail = array_slice($adjacentVertices, 1);
            $network = $network->withVertex($vertexId, WithEdge::toTargets($head, ...$tail));
        } else {
            throw new OutOfBoundsException(
                "Do not know how to handle when count of vertices is !== 1 or not >= 2"
            );
        }
    }

    $network = $network->make();

    return $network;
}
