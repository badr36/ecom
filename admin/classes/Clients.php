<?php

require_once __DIR__ . '/DB.php';
class Client extends DB {
    public function getAll(){
        return $this->query("SELECT * FROM clients");
    }
    public function get($id)
    {
        return $this->query("SELECT * FROM clients WHERE id=$id")->fetch();
    }
    public function supprimer($id)
    {
        $this->query("delete from paniers where id_client=$id");
        $this->query("delete from favoris where id_client=$id");
        $this->query("delete from commentaires where id_client=$id");
        $this->query("delete from commandes where id_client=$id");
        $this->query("delete from clients where id=$id");
    }
}