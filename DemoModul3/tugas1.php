<?php

namespace TravelApp;

// Trait untuk diskon
trait DiscountTrait {
    public function applyDiscount($price, $discount) {
        return $price - ($price * ($discount / 100));
    }
}

// Abstract class sebagai blueprint untuk paket perjalanan
abstract class TravelPackage {
    protected $destination;
    protected $price;
    protected $colorTheme;

    public function __construct($destination, $price, $colorTheme) {
        $this->destination = $destination;
        $this->price = $price;
        $this->colorTheme = $colorTheme;
    }

    // Abstract method untuk menampilkan informasi
    abstract public function displayInfo();
}

// Class untuk informasi pemesan paket perjalanan
class TravelBooking extends TravelPackage {
    use DiscountTrait;

    private $bookingId;
    private $customerName;

    public function __construct($destination, $price, $bookingId, $customerName, $colorTheme = "RedBlack") {
        parent::__construct($destination, $price, $colorTheme);
        $this->bookingId = $bookingId;
        $this->customerName = $customerName;
    }

    public function displayInfo() {
        echo "<div class='travel-package {$this->colorTheme}'>";
        echo "<h2>{$this->colorTheme} Travel Package</h2>";
        echo "<p>ID Pemesanan: {$this->bookingId}</p>";
        echo "<p>Nama Pemesan: {$this->customerName}</p>";
        echo "<p>Destinasi: {$this->destination}</p>";
        echo "<p>Harga Paket: $" . number_format($this->price, 2) . "</p>";
        echo "</div>";
    }

    public function getPriceAfterDiscount($discount) {
        return $this->applyDiscount($this->price, $discount);
    }
}

// Contoh penggunaan program
$parisTrip = new TravelBooking("Paris, France", 1500.0, "TR001", "Alice", "RedBlack");
$japanTrip = new TravelBooking("Tokyo, Japan", 1800.0, "TR002", "Bob", "RedBlack");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Package Showcase</title>
    <style>
        /* Reset dasar */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Container untuk semua paket perjalanan */
        .travel-container {
            display: flex;
            flex-direction: column; /* Mengubah agar kotak berada di atas */
            align-items: center; /* Mengatur agar berada di tengah horizontal */
            gap: 20px;
            margin-top: 20px;
            padding: 20px;
        }

        /* Styling umum untuk setiap paket perjalanan */
        .travel-package {
            border-radius: 15px;
            padding: 20px;
            width: 300px; /* Memperbesar lebar kotak */
            height: 200px; /* Menambah tinggi kotak */
            color: white;
            text-align: center;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            font-family: Arial, sans-serif;
        }

        /* Warna dan efek untuk tema merah dan hitam */
        .travel-package.RedBlack {
            background: linear-gradient(145deg, #ff0000, #333333); /* Kombinasi merah dan hitam */
            border: 3px solid #333333;
            transition: transform 0.3s ease;
        }

        .travel-package.RedBlack:hover {
            transform: scale(1.05);
            box-shadow: 0px 6px 12px rgba(255, 0, 0, 0.2);
        }

        /* Judul setiap paket perjalanan */
        .travel-package h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        /* Paragraf untuk detail paket perjalanan */
        .travel-package p {
            font-size: 16px;
            margin-bottom: 5px;
        }

        /* Style tambahan */
        body {
            background-color: #121212; /* Warna latar belakang yang gelap */
            display: flex;
            justify-content: center;
            align-items: flex-start; /* Mengubah agar berada di atas */
            height: 100vh;
            font-family: Arial, sans-serif;
        }
    </style>
</head>
<body>

<div class="travel-container">
    <?php
        $parisTrip->displayInfo();
        $japanTrip->displayInfo();
    ?>
</div>

</body>
</html>
