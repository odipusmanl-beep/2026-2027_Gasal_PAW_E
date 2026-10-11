<?php

$buah = array("A");
echo "Array awal: A<br>";
array_push($buah, "B");
echo "Hasil array_push: ";

foreach ($buah as $item) {
    echo $item . " ";
}
echo "<br><br>";
$array1 = array("A", "B");
$array2 = array("C");
echo "Array awal: A B digabung dengan C<br>";
$gabungan = array_merge($array1, $array2);
echo "Hasil array_merge: ";

foreach ($gabungan as $item) {
    echo $item . " ";
}
echo "<br><br>";

$data = array("X" => 1, "Y" => 2);
echo "Array awal: X => 1, Y => 2<br>";
$nilai = array_values($data);
echo "Hasil array_values: ";

foreach ($nilai as $item) {
    echo $item . " ";
}
echo "<br><br>";

$huruf = array("A", "B", "C");
echo "Mencari B pada array: A B C<br>";
$cari = array_search("B", $huruf);
echo "Hasil array_search: " . $cari;
echo "<br><br>";

$angka = array(0, 1, false, 2, "", 3, "array");
echo "Array awal: 0, 1, false, 2, kosong, 3, array<br>";
$hasil = array_filter($angka);
echo "Hasil array_filter: ";

foreach ($hasil as $item) {
    echo $item . " ";
}
echo "<br><br>";

$angka = array(3, 1, 2);
sort($angka);

echo "Hasil sort: ";
foreach ($angka as $item) {
    echo $item . " ";
}
echo "<br>";

$angka = array(3, 1, 2);
rsort($angka);
echo "Hasil rsort: ";
foreach ($angka as $item) {
    echo $item . " ";
}
echo "<br><br>";

$tinggi = array("Peter" => 35, "Ben" => 37, "Joe" => 43);
asort($tinggi);

echo "Hasil asort: ";
foreach ($tinggi as $nama => $nilai) {
    echo $nama . " => " . $nilai . ", ";
}
echo "<br>";

$tinggi = array("Peter" => 35, "Ben" => 37, "Joe" => 43);
ksort($tinggi);

echo "Hasil ksort: ";
foreach ($tinggi as $nama => $nilai) {
    echo $nama . " => " . $nilai . ", ";
}
echo "<br>";


$tinggi = array("Peter" => 35, "Ben" => 37, "Joe" => 43);
arsort($tinggi);

echo "Hasil arsort: ";
foreach ($tinggi as $nama => $nilai) {
    echo $nama . " => " . $nilai . ", ";
}
echo "<br>";

$tinggi = array("Peter" => 35, "Ben" => 37, "Joe" => 43);
krsort($tinggi);

echo "Hasil krsort: ";
foreach ($tinggi as $nama => $nilai) {
    echo $nama . " => " . $nilai . ", ";
}
echo "<br>";

?>

