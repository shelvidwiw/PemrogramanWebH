<?php
namespace TravelApp\Controllers;

use TravelApp\Models\TravelBooking;

class TravelController {
    private $bookings = [];

    public function __construct() {
        // Buat contoh data perjalanan
        $this->bookings[] = new TravelBooking("Paris, France", 1500.0, "TR001", "Alice", "RedBlack");
        $this->bookings[] = new TravelBooking("Tokyo, Japan", 1800.0, "TR002", "Bob", "RedBlack");
    }

    public function getBookings() {
        return $this->bookings;
    }
}
