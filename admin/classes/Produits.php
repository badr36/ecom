<?php

require_once __DIR__ . '/DB.php';

class Produit extends DB
{
    public function getAll()
    {
        return $this->query("SELECT p.id,p.nom,p.image,p.stock,p.prix,c.nom as nom_categ FROM produits p,categories c WHERE p.id_categorie=c.id");
    }

    public function get($id)
    {
        return $this->query("SELECT p.nom,p.image,p.stock,p.prix,p.id_categorie,d.contenu FROM produits p,descriptions d WHERE p.id=d.id_produit and p.id=$id")->fetch();
    }

    public function supprimer($id)
    {
        $this->query("delete from paniers where id_produit=$id");
        $this->query("delete from ligne_commandes where id_produit=$id");
        $this->query("delete from descriptions where id_produit=$id");
        $this->query("delete from commentaires where id_produit=$id");
        $this->query("delete from produits where id=$id");
    }

    public function getDescription($id)
    {
        return $this->query("SELECT * FROM descriptions WHERE id_produit=$id");
    }
    public function modifier($id)
    {
        if (isset($_FILES["image"])) {
            $img_name = $_FILES["image"]["name"];
            $img_size = $_FILES["image"]["size"];
            $tmp_name = $_FILES["image"]["tmp_name"];
            $error = $_FILES["image"]["error"];
            if ($error === 0) {
                if ($img_size > 125000) {
                    $_SESSION['e'] = " Sorry, your file is too large.";
                } else {
                    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                    $img_ex_lc = strtolower($img_ex);
                    $allowed_exs = array("jpg", "jpeg", "png");
                    if (in_array($img_ex_lc, $allowed_exs)) {
                        $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                        $img_up_path = '../uploads/' . $new_img_name;
                        move_uploaded_file($tmp_name, $img_up_path);
                        $this->query("UPDATE produits SET image=? WHERE id=$id", array($new_img_name));
                    } else {
                        $_SESSION['e'] = "You cant't upload files of this type";
                    }
                }
            } 


            $this->query("UPDATE produits SET nom=?,prix=?,stock=?,id_categorie=? WHERE id=$id", array($_POST["nom"], $_POST["prix"], $_POST["stock"], $_POST["categorie"]));
            foreach ($_POST['description'] as $key => $value)
                $this->query("UPDATE descriptions SET contenu=? WHERE id=$key", array($value));
            if(isset($_POST['tab']))
            {
                $supp_desc = implode(',', array_keys($_POST["tab"]));
                $this->query("DELETE FROM descriptions WHERE id IN ($supp_desc)");
            }
            if(isset($_POST['add']))
            {
                foreach($_POST['add'] as  $value)
                {
                    $this->query("INSERT INTO descriptions VALUES(NULL,?,?)",array($value,$id));
                }
            }
        }
    }

    public function ajouter()
    {
        
        
       
         if (isset($_FILES["image"])) {
            $img_name = $_FILES["image"]["name"];
             $img_size = $_FILES["image"]["size"];
            $tmp_name = $_FILES["image"]["tmp_name"];
             $error = $_FILES["image"]["error"];
             if ($error === 0) {
                 if ($img_size > 125000) {
                    $_SESSION['e'] = " Sorry, your file is too large.";
                 } else {
                    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                    $img_ex_lc = strtolower($img_ex);
                     $allowed_exs = array("jpg", "jpeg", "png");
                    if (in_array($img_ex_lc, $allowed_exs)) {
                        $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                        $img_up_path = '../uploads/' . $new_img_name;
                        move_uploaded_file($tmp_name, $img_up_path);
                       $conn=$this->getDB();
                        $req=$conn->prepare("INSERT INTO produits VALUES(NULL,?,?,?,?,?)");
                        $req->execute(array($_POST["nom"], $_POST["prix"], $_POST["stock"],$new_img_name,$_POST["categorie"]));
                        $id=$conn->lastInsertId();
                        $_SESSION['e'] = "You cant't upload files of this type";
                     }
                 }
             }
    }
    
    if(isset($_POST['add']))
    {
        foreach($_POST['add'] as  $value)
        {
            $this->query("INSERT INTO descriptions VALUES(NULL,?,?)",array($value,$id));
        }
    }
    }
}