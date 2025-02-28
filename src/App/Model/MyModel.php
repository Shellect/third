<?php

namespace App\Model;

use PDO;

class MyModel {
    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function getAllRecordsModel() {
        $query = "SELECT * FROM Pictures"; // Замените Pictures на вашу таблицу
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}