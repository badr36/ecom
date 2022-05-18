<?php

require_once __DIR__ . '/DB.php';
require_once __DIR__ . '/Panier.php';

class Client extends DB{

    public array  $errors;
    private $email;
    private $mdp;
    private $nom;
    private $prenom;
    private $adresse1;
    private $adresse2;

    public function __construct( $email=null, $mdp=null, $nom=null, $prenom=null, $adresse1=null, $adresse2=null)
    {
        $this->nom =$nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->mdp = $mdp;
        $this->adresse1 = $adresse1;
        $this->adresse2 = $adresse2;
    }
    
    public function exists()
    {
       return  $this->query(" SELECT email, mdp FROM clients WHERE email=? AND mdp=?", array($this->email,$this->mdp))->rowCount() > 0;
    }

    public function connexion()
    {
        if($this->exists())
        { 
            $_SESSION['id_client']= $this->query(" SELECT id FROM clients WHERE email=? AND mdp=?", array($this->email,$this->mdp))->fetch()['id'];
            $this->panierToDB($_SESSION['id_client']);
            header('location: index.php');
        }
        else
            $this->errors['emailetmdp']= 'email ou mot de passe incorrect';
    }

    public function inscription()
    {
        if(preg_match('#[0-9]#',$this->nom))
            $this->errors['nom']= 'Entrez un nom valide';
        if(preg_match('#[0-9]#',$this->prenom))
            $this->errors['prenom']= 'Entrez un prénom valide';
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL))
            $this->errors['email']= 'Entrez un email valide';
        if( strlen($this->mdp)< 8)
            $this->errors['mdp']= 'Le mot de passe doit contenir 8 caractères au minimum';
        if(empty($this->errors))
        {
            if($this->query("SELECT * FROM clients WHERE email=?", array($this->email))->rowCount()==0)
            {
                $this->query("INSERT INTO clients (nom, prenom, email, mdp) VALUES (?,?,?,?)",array($this->nom,$this->prenom,$this->email,$this->mdp));
                $this->connexion();
            }
            else
                $this->errors['email']= 'Email existe déjà';
        }

    }

    public function panierToDB($id_client)
    {
        if(isset($_SESSION['panier']))
        {
            $panier = new Panier();
            foreach($_SESSION['panier'] as $id => $qty)
            {
                if($panier->exists($id))
                {
                    $this->query("UPDATE paniers SET qty=? WHERE id_produit=? AND id_client=?", array(
                        $qty,
                        $id,
                        $id_client
                    ));
                }
                else
                {
                    $this->query("INSERT INTO paniers (id_produit, qty, id_client) VALUES (?,?,?)", array(
                        $id,
                        $qty,
                        $id_client
                    ));
                }
               
            }
            unset($_SESSION['panier']);
        }
    }

    public function get($id)
    {
        return $this->query("SELECT * FROM clients WHERE id=?", array($id))->fetch();
    }

    public function modifier($id)
    {
        $this->query("UPDATE clients set nom=?,prenom=?,email=?,adresse_1=?,adresse_2=? WHERE id=?", array(
            $this->nom,
            $this->prenom,
            $this->email,
            $this->adresse1,
            $this->adresse2,
            $id
        ));
       
    }
}
