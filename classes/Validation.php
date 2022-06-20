<?php
require_once __DIR__ . '/DB.php';

class validation extends DB{
     public function info(){

        return $this->query("SELECT nom,prenom,adresse_1,adresse_2,telephone,email 
                                from clients 
                                where  id=?",array ($_SESSION['id_client']));
     }
}