<?php

$height = array("enjel" => "150", "defi" => "140", "yoel" => "130");
$height["nita"] = "190";
$height["tiara"] = "180";
$height["dipus"] = "170";
$height["iman"] = "160";
$height["nufail"] = "120";

echo 'height = (';
$first = true;
foreach ($height as $nama => $tinggi) {
    if (!$first) {
        echo ", ";
    }
    echo '"' . $nama . '"=>"' . $tinggi . '"';
    $first = false;
}
echo ')';

$lastKey = array_key_last($height);
echo "<br>Nilai dengan indeks terakhir: " . $height[$lastKey];
echo "<br><br>";

unset($height["enjel"]);
echo 'height = (';
$first = true;

foreach ($height as $nama => $tinggi) {
    if (!$first) {
        echo ", ";
    }
    echo '"' . $nama . '"=>"' . $tinggi . '"';
    $first = false;
}
echo ')';

$lastKey = array_key_last($height);
echo "<br>Nilai dengan indeks terakhir setelah dihapus: " . $height[$lastKey];
echo "<br><br>";

$weight = array("Andy"=>"70", "Barry"=>"65", "Charlie"=>"75");
echo 'weight = ("Andy"=>"70", "Barry"=>"65", "Charlie"=>"75")';
echo "<br>Data kedua: " . $weight["Barry"];

?>

