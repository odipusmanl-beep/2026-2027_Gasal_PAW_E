<?php

$fruits = array("apel", "jeruk", "mangga");

for ($i = 1; $i <= 5; $i++) {
    $fruits[] = "buah tambah " . $i;
}


$arrlength = count($fruits);
echo "panjang array saat ini: " . $arrlength;
echo "<br>";

for ($j = 0; $j < $arrlength; $j++) {
    echo $fruits[$j];
    echo "<br>";
}
echo "<br>";
$vegies = array("bayam", "wortel", "koll");

$arrlength = count($vegies);

for ($u = 0; $u < $arrlength; $u++){
    echo $vegies[$u];
    echo "<br>";
}


?>