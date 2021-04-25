<?php
for ($i = 1; $i <= 100; $i++) {
    if ($i / 3 == round($i / 3)) {
        echo 'bold <br>';
    } elseif ($i / 10 == round($i / 10)) {
        echo 'italics <br>';
    } else {
        echo $i . '<br>';
    }
}
