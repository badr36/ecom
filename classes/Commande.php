<?php
require_once __DIR__ . '/DB.php';
require_once __DIR__ . '/Panier.php';



class Commande extends DB{


    public $panier;

    public function __construct()
    {
        $this->panier = new Panier();
    }

    public function getAll(){

        return $this->query("SELECT * from commandes 
                where  id_client=?",array ($_SESSION['id_client']));

    }
    public function get($id){

        return $this->query("SELECT *,(prix*qty) as total_produit from  ligne_commandes ligne, produits prod ,commandes cmd
        where prod.id=ligne.id_produit and cmd.id=ligne.id_commande and cmd.id_client=? and cmd.id=?",array ($_SESSION['id_client'],$id));
    }
    public function getTotal($id){

        return $this->query("SELECT SUM(prix*qty) as total from ligne_commandes ligne, produits prod 
                    where prod.id=ligne.id_produit and id_commande=? ",array($id))->fetch()["total"];
    }

    public function valider()
    {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $adr1 = $_POST['adr1'];
        $adr2 = $_POST['adr2'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];

        if(isset($_SESSION['id_client']))
        {
            $this->query("UPDATE clients set nom=?, prenom=?, adresse_1=?, adresse_2=?, telephone=?, email=? WHERE id=?", array(
                $nom,
                $prenom,
                $adr1,
                $adr2,
                $tel,
                $email,
                $_SESSION['id_client']
            ));

            $db = $this->getDB();
            $req = $db->prepare("INSERT INTO commandes (id_client,status) VALUES(?,'En Attente')");
            $req->execute(array($_SESSION['id_client']));

            $id_cmd = $db->lastInsertId();

            $produits = $this->panier->get();

            while($p = $produits->fetch())
            {
                $q = $db->prepare("INSERT into ligne_commandes VALUES(NULL,?,?,?)");
                $q->execute(array(
                    $p['qty'],
                    $id_cmd,
                    $p['id']
                ));
            }

        }
        else if(isset($_SESSION['panier']))
        {
            $db = $this->getDB();

            $req = $db->prepare("INSERT into clients (nom,prenom,adresse_1,adresse_2,telephone,email) VALUES(?,?,?,?,?,?)");

            $req->execute(array(
                $nom,
                $prenom,
                $adr1,
                $adr2,
                $tel,
                $email
            ));

            $id_cli = $db->lastInsertId();

            
            $req = $db->prepare("INSERT INTO commandes (id_client,status) VALUES(?,'En Cours')");
            $req->execute(array($id_cli));

            $id_cmd = $db->lastInsertId();

            foreach($_SESSION['panier'] as $id=>$qty)
            {
                $q = $db->prepare("INSERT into ligne_commandes VALUES(NULL,?,?,?)");
                $q->execute(array(
                    $qty,
                    $id_cmd,
                    $id
                ));
            }
        }
    }
    
}
