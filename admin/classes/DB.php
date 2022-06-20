<?php

class DB{

    public function query($q, $param = null){

        $db = $this->getDB();
        $req = $db->prepare($q);
        $req->execute($param);

        return $req;
    }

    public function getDB()
    {
        return new pdo('mysql:host=localhost;dbname=ecom;charset=utf8', 'root', '');
    }
}

