<?php

// array dimensi
echo "<h1> Array dimensi </h1>";

$nama = array("Joni","Tejo","Budi","Siti",100,2.5);

var_dump($nama);

echo "<br>";

echo $nama[5];

echo "<br>";

for ($i=0; $i < 6; $i++) { 
    echo $i;
    echo "<br>";
    echo $nama[$i]. "<br>";
}

echo "<br>";

foreach ($nama as $k) {
    echo $k. '<br>';
}

// array asosiatif

echo "<h1> Array Asosiatif </h1>";

// $nama = array(
//     "Joni" => "Surabaya",
//     "Budi" => "Malang Raya",
//     "Tejo" => "Jakarta",
//     "Siti" => "Sidoarjo"
// );

$name ["Joni"] = "Surabaya";
$name ["Budi"] = "Malang Raya";
$name ["Tejo"] = "Jakarta";
$name ["Siti"] = "Sidoarjo";
$name ["Edi"] = "Semarang";

var_dump($name);

echo "<br> <br>";

foreach ($name as $k => $v) {
    echo $k. " => " .$v;

    echo "<br>";
}

?>