<?php

require_once __DIR__ . '/DB.php';

class Commande extends DB{
    public function getTotalVente()
    {
        return number_format($this->query("SELECT SUM(lc.qty*p.prix) tot FROM ligne_commandes lc, produits p, commandes c
        WHERE lc.id_produit=p.id AND lc.id_commande=c.id AND c.status='livree'")->fetch()['tot'], 2, '.', ' ');;
    }

    public function getTotalVenteAuj()
    {
        return number_format($this->query("SELECT SUM(lc.qty*p.prix) tot FROM ligne_commandes lc, produits p, commandes c
        WHERE lc.id_produit=p.id AND lc.id_commande=c.id AND c.status='livree' AND DATE(c.date)=DATE(SYSDATE())")->fetch()['tot'], 2, '.', ' ');
    }

    public function getTotalCommande()
    {
        return $this->query("SELECT count(*) tot FROM commandes")->fetch()['tot'];
    }

    public function getTotalCommandeAuj()
    {
        return $this->query("SELECT count(*) tot FROM commandes WHERE DATE(date)=DATE(SYSDATE())")->fetch()['tot'];
    }

    public function getRevenueParMois()
    {
        return $this->query("SELECT MONTHNAME(c.date) d, SUM(lc.qty*p.prix) tot
                            FROM ligne_commandes lc, produits p, commandes c
                            WHERE lc.id_produit=p.id AND lc.id_commande=c.id AND c.status='livree' AND YEAR(c.date)=YEAR(SYSDATE())
                            GROUP BY d
                            ORDER BY date");
    }

    public function getCommandeParMois()
    {
        return $this->query("SELECT MONTHNAME(date) d, count(*) tot FROM commandes WHERE status='livree' AND YEAR(date)=YEAR(SYSDATE())
                            GROUP BY d
                            ORDER BY date");
    }

    public function getCategorie()
    {
        return $this->query("SELECT c.nom n, count(*) tot
                                FROM ligne_commandes lc, produits p, categories c
                                WHERE lc.id_produit=p.id AND p.id_categorie=c.id
                                GROUP BY n");
    }

    public function getCommande()
    {
        return $this->query("SELECT *,(p.prix*l.qty) as total 
               FROM commandes c,ligne_commandes l,produits p,clients cl
               WHERE c.id=l.id_commande
               AND   p.id=l.id_produit
               AND   cl.id=c.id_client
               GROUP BY c.id
               ORDER BY c.date desc");
    }

    public function get($id){

        return $this->query("SELECT *,(prix*qty) as total_produit from  ligne_commandes ligne, produits prod ,commandes cmd
        where prod.id=ligne.id_produit and cmd.id=ligne.id_commande and cmd.id=?",array ($id));
    }

    public function getTotal($id){

        return $this->query("SELECT SUM(prix*qty) as total from ligne_commandes ligne, produits prod 
                    where prod.id=ligne.id_produit and id_commande=? ",array($id))->fetch()["total"];
    }
}