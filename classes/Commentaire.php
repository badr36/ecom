<?php

require_once __DIR__ . '/DB.php';

class Commentaire extends DB{
    public function getAll($id_produit)
    {
        return $this->query("SELECT * FROM commentaires cm, clients cl WHERE cm.id_client=cl.id AND id_produit=?", array($id_produit));
    }
}