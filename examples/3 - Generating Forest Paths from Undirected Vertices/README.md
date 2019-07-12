# 3 - Bidirectionally Find All Possible Paths Between Two Vertices

This example contains the code necessary to retrieve all-pairs shortest paths from `A → E` and `E → A`.

Note, that currently the library does not provide a way to retrieve *all-pairs all paths* between `A → E`. It is computationally expensive and slow and would require a specific use case. For example, the library will correctly identify the shortest path from `A → E` as being the actual edge connecting vertex A to vertex E, but it will not be able to return the alternate path from `A → E` which is `A → B → F → E` (since it is not the shortest).

The adjacency list graph below continues to be the basis for this example.

```
7 vertices, 7 edges

A: B C E
B: A D F
C: A G
E: A F
D: B
F: B E
```

## Results

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

-------------------------------------
Shortest paths to all vertices from A
-------------------------------------

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

-------------------------------------
Shortest paths to all vertices from E
-------------------------------------

Array
(
    [A] => Array
        (
            [0] => E
            [1] => A
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

    [D] => Array
        (
            [0] => E
            [1] => A
            [2] => B
            [3] => D
        )

    [F] => Array
        (
            [0] => E
            [1] => F
        )

    [G] => Array
        (
            [0] => E
            [1] => A
            [2] => C
            [3] => G
        )

)

--------------------------
Shortest path from A → E
--------------------------

Array
(
    [0] => A
    [1] => E
)

--------------------------
Shortest path from E → A
--------------------------

Array
(
    [0] => E
    [1] => A
)
```
