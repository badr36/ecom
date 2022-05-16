<?php

require_once __DIR__ . '/DB.php';

class Client extends DB{

    public array  $errors;
    private $email;
    private $mdp;
    private $nom;
    private $prenom;
    public function __construct( $email, $mdp, $nom=null, $prenom=null)
    {
        $this->nom =$nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->mdp = $mdp;
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

}
