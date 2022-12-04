<?php

    $nama = array ("Joni","Budi","Tejo","Siti",100);

    var_dump($nama);

    echo"<br> <br>";

    foreach ($nama as $key) {
        echo $key. "<br>";
    }

    echo "<br> <br>";

    $name = array (
        "Joni" => "Semarang",
        "Budi" => "Surabaya",
        "Tejo" => "Malang",
        "Siti" => "Sidoarjo"
    );

    var_dump($name);

    echo"<br><br>";

    foreach ($name as $a => $b) {
        echo $a. " => " .$b;
        echo "<br>";
    }

?>