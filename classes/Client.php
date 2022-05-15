<?php

require_once __DIR__ . '/DB.php';

class Client extends DB{
    public function get(){
        $client= $this->query('SELECT * FROM clients ');
        if(isset($_POST['containe'])){
            $nom=$_POST['fname'];
            $prenom=$_POST['lname'];
            echo $nom;
            $mail=$_POST['mail'];
            $adresse=$_POST['map'];
            $client = $this->query("UPDATE clients SET fname='$nom', lastname= '$prenom' , mail= '$mail', map= '$adresse' where fname='$nom'");
        }
        return client;
        if ($_POST['pass1']==$_POST['pass2']){
        $pass_hash=sha1($_POST['pass1']);
        $client= $this->querry('UPDATE client SET pass1=? WHERE pass1= ?',array($pass_hache,$_SESSION['pass1']));
        echo 'La modification de mot de passe a été prise en compte ! Déconnectez-vous et reconnectez-vous afin de valider ce changement.';
    }
} }