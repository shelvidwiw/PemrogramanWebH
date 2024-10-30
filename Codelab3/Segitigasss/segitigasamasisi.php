<?php
echo "<pre>"; // Menggunakan tag <pre> agar spasi dan new line tetap terjaga

$rows = 5; // Jumlah baris segitiga
for ($i = 1; $i <= $rows; $i++) {
    // Cetak spasi
    for ($j = $i; $j < $rows; $j++) {
        echo " "; // Cetak spasi
    }
    // Cetak bintang
    for ($k = 1; $k <= (2 * $i - 1); $k++) {
        echo "*";
    }
    echo "\n"; // Pindah ke baris baru
}

echo "</pre>";
?>