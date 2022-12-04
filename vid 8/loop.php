<?php
echo "<h1>tambah satu per angka</h1>";
for ($i=1; $i <= 12 ; $i++) { 
    echo $i . ',';
}
echo '<br>';

echo "<h1>tambah 2 per angka</h1>";
for ($i=1; $i <= 12 ; $i=$i + 2) { 
    echo $i . ',';
}
echo '<br>';

echo "<h1>mulai pengurutan dari belakang</h1>";
for ($i=12; $i >= 1 ; $i--) { 
    echo $i . ',';
}
echo '<br>';

echo "<h1>While do</h1>";
$a=1;
while ($a <= 10) {
    echo $a. ',';
    $a++;
}
echo '<br>';

echo "<h1>do while</h1>";
$a=1;
do {
    echo $a.',';
    $a++;
}
while ($a <= 10);

//  1,2,3,4,5,6,7,8,9,10.11,12

?>