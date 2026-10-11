<?php

$fruits = array("aku", "kamu", "mereka");

$fruits[] = "kita";
$fruits[] = "kau";
$fruits[] = "kuuu";
$fruits[] = "you";
$fruits[] = "dipus";

// Menampilkan data awal
echo "fruits=(";
echo '"' . implode('","', $fruits) . '")';

echo "<br>Nilai dengan index tertinggi : " . $fruits[count($fruits) - 1];

unset($fruits[1]);

echo "<br><br>Data kamu dihapus.<br>";

echo "fruits = (";
echo '"' . implode('","', $fruits) . '")';

echo "<br>Nilai dengan index tertinggi : " . $fruits[7];
?>

