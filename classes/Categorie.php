<?php

require_once __DIR__ . '/DB.php';

class Categorie extends DB{
    public function getAll()
    {
        return $this->query("SELECT * FROM categories");
    }
}