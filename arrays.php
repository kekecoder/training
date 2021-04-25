<?php
    $cars = ["volvo", "mercedez", "toyota", "volkswagen"];

    $cars[4] = "camry";
    array_push($cars, "Muscle");
    array_unshift($cars, 'Bathroom');
    array_shift($cars);
    array_pop($cars);

    foreach($cars as $car){
        echo $car . "<br>";
    }

    echo "<pre>";
    var_dump($cars);
    echo "</pre>";