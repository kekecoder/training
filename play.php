<?php

foreach (range(1, 100000) as $num) {
    if (0 !== $num % 3 && 0 !== $num % 10) {
        echo $num . "<br>";
        continue;
    }

    if (0 == $num % 3) {
        echo "bold <br>";
    }

    if (0 == $num % 10) {
        echo "italics <br>";
    }
}
