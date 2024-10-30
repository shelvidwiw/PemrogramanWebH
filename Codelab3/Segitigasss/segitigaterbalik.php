<?php
echo "<pre>"; // Menggunakan <pre> untuk menjaga format

$rows = 5; // Jumlah baris segitiga
for ($i = $rows; $i >= 1; $i--) {
    // Cetak spasi di sebelah kiri
    for ($j = $rows; $j > $i; $j--) {
        echo " ";
    }
    // Cetak bintang
    for ($k = 1; $k <= (2 * $i - 1); $k++) {
        echo "*";
    }
    echo "\n"; // Pindah ke baris baru
}

echo "</pre>";
?>