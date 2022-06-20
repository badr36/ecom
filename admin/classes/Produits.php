<?php

require_once __DIR__ . '/DB.php';

class Produit extends DB{
    public function getAll()
    {
        return $this->query("SELECT p.id,p.nom,p.image,p.stock,p.prix,c.nom as nom_categ FROM produits p,categories c WHERE p.id_categorie=c.id");
    }

    public function get($id)
    {
       return $this->query("SELECT p.nom,p.image,p.stock,p.prix,p.id_categorie,d.contenu FROM produits p,descriptions d WHERE p.id=d.id_produit and p.id=$id")->fetch(); 
    }

    public function delete($id)
    {
        $this->query("delete from paniers where id_produit=$id");
        $this->query("delete from ligne_commandes where id_produit=$id");
        $this->query("delete from favoris where id_produit=$id");
        $this->query("delete from descriptions where id_produit=$id");
        $this->query("delete from commentaires where id_produit=$id");
        $this->query("delete from produits where id=$id");
    }
    
    public function modifier($id)
    {
      if(isset($_FILES["image"])){ 
        $img_name = $_FILES["image"]["name"];
        $img_size = $_FILES["image"]["size"];
        $tmp_name = $_FILES["image"]["tmp_name"];
        $error = $_FILES["image"]["error"];
        if ($error === 0) {
            if ($img_size > 125000) {
                $em = " Sorry, your file is too large.";
                header("location: produits.php?error=$em");
            } else {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $allowed_exs = array("jpg", "jpeg", "png");
                if (in_array($img_ex_lc, $allowed_exs)) {
                    $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                    $img_up_path = '../uploads/' . $new_img_name;
                    move_uploaded_file($tmp_name, $img_up_path);
                    $this->query("UPDATE produits SET image=? WHERE id=$id",array($new_img_name));
                } else {
                    $em = "You cant't upload files of this type";
                    header("location:produits.php?error=$em");
                }
            }
        } else {
            $em = "unknown error occurred";
            header("location:produits.php?error=$em");
        }
        
        

        $this->query("UPDATE produits SET nom=?,prix=?,stock=?,id_categorie=? WHERE id=$id",array($_POST["nom"],$_POST["prix"],$_POST["stock"],$_POST["categorie"]));
       
    }
}
}