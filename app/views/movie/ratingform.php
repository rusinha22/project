<?php
class Rating {
    private $db;

    public function __construct() {
        $this->db = new PDO("mysql:host=localhost;dbname=your_db_name", "root", ""); // Update your DB credentials
    }

    public function save($title, $rating) {
        $stmt = $this->db->prepare("INSERT INTO ratingform (title, rating) VALUES (:title, :rating)");
        $stmt->execute([
            ':title' => $title,
            ':rating' => $rating
        ]);
    }
}
