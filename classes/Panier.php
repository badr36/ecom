<?php
session_start();
require __DIR__ . '/DB.php';

class panier extends DB{
    public function __construct()
    {
        if(!isset($_SESSION['panier']) && !isset($_SESSION['id_client'])){
          $_SESSION['panier']= array();
        }
    } 
    public function ajouter($id)
    {
        if($this->query(' SELECT stock FROM produits WHERE id=?' , array($id))->fetch()['stock'] > 0){
            if(isset($_SESSION['id_client']))
            {

            }
            else
            {
                if(!array_key_exists($_SESSION['panier'], $id))
                {
                     $_SESSION['panier'][$id] = 1;
                }

            }
        }
        
       

    }
}







    