<?php

require_once __DIR__ . '/DB.php';

class Client extends DB{

    public array  $errors;
    private $email;
    private $mdp;
    public function __construct($email, $mdp)
    {
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
            $this->errors['email ou mot de passe incorrect']= true;
    }

}
