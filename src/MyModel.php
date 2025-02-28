<?php

class MyModel {
    public function __construct(private $db) {}

    public function getAllRecordsModel() {
        $query = "SELECT * FROM Pictures"; 
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}