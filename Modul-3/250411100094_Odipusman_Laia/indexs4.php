<?php

$height = array(
    "Andy" => "176",
    "Barry" => "165",
    "Charlie" => "170"
);

$height["David"] = "180";
$height["Ethan"] = "172";
$height["Frank"] = "168";
$height["George"] = "175";
$height["Harry"] = "182";
echo 'height = (';

$first = true;

foreach ($height as $nama => $tinggi) {
    if (!$first) {
        echo ', ';
    }
    echo '"' . $nama . '"=>"' . $tinggi . '"';
    $first = false;
}
echo ')<br><br>';

foreach ($height as $nama => $tinggi) {
    echo $nama . " is " . $tinggi . " cm tall.<br>";
}
echo "<br>";

$weight = array(
    "Andy" => "70",
    "Barry" => "65",
    "Charlie" => "75"
);
echo 'weight = (';
$first = true;
foreach ($weight as $nama => $berat) {
    if (!$first) {
        echo ', ';
    }
    echo '"' . $nama . '"=>"' . $berat . '"';
    $first = false;
}
echo ')<br><br>';
$namaOrang = array_keys($weight);
$beratBadan = array_values($weight);

for ($i = 0; $i < count($weight); $i++) {
    echo $namaOrang[$i] . " is " . $beratBadan[$i] . " kg.<br>";
}

?>