# 4 - Using MultiDijkstraPathfinder to Find Paths

This example contains the code necessary to retrieve all shortest paths from `A → E` and `E → A` using hte Dijkstra algorithm.

The graph being operated on remains the same.

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

## Results

### Directed Graph

```
--------------
Index (forest)
--------------

Stratadox\Pathfinder\Index Object
(
    [nextNodeOnTheRoad:Stratadox\Pathfinder\Index:private] => Array
        (
            [A] => Array
                (
                    [B] => B
                    [C] => C
                    [E] => E
                    [F] => B
                    [D] => B
                    [G] => C
                )

            [B] => Array
                (
                    [D] => D
                    [F] => F
                    [E] => F
                )

            [F] => Array
                (
                    [E] => E
                )

            [C] => Array
                (
                    [G] => G
                )

        )

)

------------------------------------
MultiDijkstraPathfinder paths from A
------------------------------------

Array
(
    [B] => Array
        (
            [0] => A
            [1] => B
        )

    [C] => Array
        (
            [0] => A
            [1] => C
        )

    [E] => Array
        (
            [0] => A
            [1] => E
        )

    [D] => Array
        (
            [0] => A
            [1] => B
            [2] => D
        )

    [F] => Array
        (
            [0] => A
            [1] => B
            [2] => F
        )

    [G] => Array
        (
            [0] => A
            [1] => C
            [2] => G
        )

)

------------------------------------
MultiDijkstraPathfinder paths from E
------------------------------------

Array
(
)
```

### Undirected Graph

```
--------------
Index (forest)
--------------

Stratadox\Pathfinder\Index Object
(
    [nextNodeOnTheRoad:Stratadox\Pathfinder\Index:private] => Array
        (
            [A] => Array
                (
                    [B] => B
                    [C] => C
                    [E] => E
                    [D] => B
                    [F] => B
                    [G] => C
                )

            [B] => Array
                (
                    [A] => A
                    [D] => D
                    [F] => F
                    [C] => A
                    [E] => A
                    [G] => A
                )

            [C] => Array
                (
                    [A] => A
                    [G] => G
                    [B] => A
                    [E] => A
                    [D] => A
                    [F] => A
                )

            [E] => Array
                (
                    [A] => A
                    [F] => F
                    [B] => A
                    [C] => A
                    [D] => A
                    [G] => A
                )

            [D] => Array
                (
                    [B] => B
                    [A] => B
                    [C] => B
                    [E] => B
                    [F] => B
                    [G] => B
                )

            [F] => Array
                (
                    [B] => B
                    [E] => E
                    [A] => B
                    [C] => B
                    [D] => B
                    [G] => B
                )

            [G] => Array
                (
                    [C] => C
                    [A] => C
                    [B] => C
                    [E] => C
                    [D] => C
                    [F] => C
                )

        )

)

------------------------------------
MultiDijkstraPathfinder paths from A
------------------------------------

Array
(
    [B] => Array
        (
            [0] => A
            [1] => B
        )

    [C] => Array
        (
            [0] => A
            [1] => C
        )

    [E] => Array
        (
            [0] => A
            [1] => E
        )

    [D] => Array
        (
            [0] => A
            [1] => B
            [2] => D
        )

    [F] => Array
        (
            [0] => A
            [1] => B
            [2] => F
        )

    [G] => Array
        (
            [0] => A
            [1] => C
            [2] => G
        )

)

------------------------------------
MultiDijkstraPathfinder paths from E
------------------------------------

Array
(
    [A] => Array
        (
            [0] => E
            [1] => A
        )

    [F] => Array
        (
            [0] => E
            [1] => F
        )

    [B] => Array
        (
            [0] => E
            [1] => A
            [2] => B
        )

    [C] => Array
        (
            [0] => E
            [1] => A
            [2] => C
        )

    [G] => Array
        (
            [0] => E
            [1] => A
            [2] => C
            [3] => G
        )

    [D] => Array
        (
            [0] => E
            [1] => A
            [2] => B
            [3] => D
        )

)
```
