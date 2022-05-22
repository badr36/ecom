CREATE DATABASE if not exists ecom CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

use ecom;
SET NAMES utf8;
-- CREATION DE LA TABLE DES CATEGORIES
create table if not exists categories(
    id int auto_increment,
    nom varchar(50) not null,
    primary key(id)
);


-- INSERTION DANS LA TABLE DES CATEGORIES
insert into categories (nom) values ('laptops'),
                                    ('composants'),
                                    ('périphériques pc');

-- CREATION DE LA TABLE DES PRODUITS
create table if not exists produits(
    id int auto_increment,
    nom varchar(50) not null,
    prix double not null,
    stock int not null,
    image varchar(255) not null,
    id_categorie int,
    primary key(id),
    FOREIGN KEY (id_categorie) REFERENCES categories(id)
);

-- INSERTION DANS LA TABLE DES PRODUITS
insert into produits (nom, prix, stock, image, id_categorie) values ('msi mag x570s torpedo max', 3594, 5, '1.jpg', 2),
                                                                    ('gigabyte z690 aorus pro ddr5', 4684, 10, '2.jpg', 2),
                                                                    ('ducky channel one 2 mini rgb noir – brown switch', 9624, 3, '3.jpg', 3),
                                                                    ('corsair vengeance rgb pro 16 go (8×2) 3200mhz blanc', 2474, 8, '4.jpg', 2),
                                                                    ('msi optix mag251rx', 3586, 2, '5.jpg', 2),
                                                                    ('asus rog strix geforce rtx 3070 o8g gaming v2 lhr', 7536, 10, '6.jpg', 2);
                                   
-- CREATION DE LA TABLE DES DESCRIPTIONS
create table if not exists descriptions(
    id int auto_increment,
    contenu text not null,
    id_produit int,
    primary key(id),
    FOREIGN key (id_produit) REFERENCES produits(id)
);

-- INSERTION DANS LA TABLE DES DESCRIPTIONS
insert into descriptions (id_produit, contenu) values (1, 'socket amd am4 pour processeur amd ryzen 2000(g)/3000(g)/4000g/5000(g)'),
                                                        (1, 'ddr4 5100 mhz (oc) dual-channel'),
                                                        (1, '1 x m.2 pcie 4.0 x4 + 1 x m.2 pcie 4.0 x4 / sata 6 gbit/s'),
                                                        (1, 'système de refroidissement optimal'),
                                                        (1, 'connecteur lan 2.5gbe et lan 1 gbe avec lan manager'),
                                                        (1, 'audio boost 5 pour un son de qualité supérieure'),
                                                        (2, 'support des processeurs intel core de 12ème génération sur socket lga 1700'),
                                                        (2, 'support de la mémoire ddr5'),
                                                        (2, 'vrm twin hybrid  16+1+2 phases avec 60a drmos pci-express 5.0 16'),
                                                        (2, 'rgb fusion 2.0 compatible avec leds adressables et bandes led rgb'),
                                                        (2, 'réseau 2.5 gigabits + wi-fi 6 ax'),
                                                        (3, 'clavier mécanique'),
                                                        (3, 'switches cherry mx rgb red switch'),
                                                        (3, 'rétro-éclairage individuel des touches multicolore'),
                                                        (3, 'nombreux effets visuels différents'),
                                                        (3, 'technologie « n-key rollover » (anti-ghosting)'),
                                                        (3, 'technologie « 1000 hz report rate »'),
                                                        (3, 'aucun pilote nécessaire'),
                                                        (3, 'livré avec un lot de 4 touches uniques teintées et inspirées des perles de verre paiwan'),
                                                        (3, 'en cas de mise a jour, choisissez votre modèle exact (la garantie ne couvre pas l’autre cas)'),
                                                        (4, 'modèle : cmh16gx4m2z3600c16'),
                                                        (4, 'type de mémoire : ddr4'),
                                                        (4, 'fréquence mémoire: ddr4 3600mhz'),
                                                        (4, 'norme mémoire: pc4-28800'),
                                                        (4, 'capacité : 16 go'),
                                                        (5, 'moniteur de 24 pouces avec résolution full hd'),
                                                        (5, 'dalle fast ips : temps de réponse rapide (1 ms)'),
                                                        (5, 'nvidia g-sync compatible'),
                                                        (6, 'désignation : asus rog strix geforce rtx 3070 o8g gaming v2 lhr'),
                                                        (6, 'modèle :  90yv0fr7-m0na00'),
                                                        (6, 'chipset graphique : nvidia');
                                                        

-- CREATION DE LA TABLE DES CLIENTS
create table if not exists clients(
    id int auto_increment,
    nom varchar(50) not null,
    prenom varchar(50) not null,
    adresse_1 varchar(255) not null,
    adresse_2 varchar(255),
    telephone varchar(50),
    email varchar(255) not null,
    mdp varchar(255) not null,
    primary key(id)
);

-- INSERTION DANS LA TABLE DES CLIENTS
insert into clients (nom, prenom, adresse_1, telephone, email, mdp) values ('elyatim', 'badr', 'residence nadia immeuble u', '0655102683', 'flipbadr7@gmail.com', '12345678'),
                                                                            ('bahmou', 'aicha', 'hay moulay abd allah', '0690856979', 'aichabahmou04@gmail.com', '12345678'),
                                                                            ('saadi', 'ahlame', 'ain chock', '0695007713', 'ahlame@gmail.com', '12345678'),
                                                                            ('abir', 'hanaa', 'oulfa', '0777890417', 'abirhanaa7@gmail.com', '12345678');

-- CREATION DE LA TABLE DES COMMANDES
create table if not exists commandes (
    id int auto_increment,
    date timestamp not null,
    id_client int,
    status varchar(50),
    primary key(id),
    FOREIGN KEY (id_client) REFERENCES clients(id)
);

-- INSERTION DANS LA TABLE DES COMMANDES
insert into commandes (id_client, date ,status) values (1, '2022-05-01 19:25:19','En cours'),
                                                (2, '2020-03-01 14:20:19','Livrée'),
                                                (3, '2021-12-05 19:25:19','En attente'),
                                                (4, '2022-10-08 10:12:10','Annuléé');



 -- CREATION DE LA TABLE DES LIGNES DE COMMANDES
 create table if not exists ligne_commandes (
     id int auto_increment,
     qty int,
     id_commande int,
     id_produit int,
     primary key(id),
     FOREIGN key (id_commande) REFERENCES commandes(id),
     FOREIGN key (id_produit) REFERENCES produits(id)
 );

--  INSERTION DANS LA TABLE LIGNE_COMMANDES
insert into ligne_commandes (id_produit, qty, id_commande) values (1, 2, 1),
                                                                    (3, 5, 2),
                                                                    (2, 2, 2),
                                                                    (4, 1, 3),
                                                                    (5, 6, 3),
                                                                    (6, 7, 4),
                                                                    (1, 4 ,4);

-- CREATION DE LA TABLE DES FAVORIS
create table if not exists favoris(
    id int auto_increment,
    id_client int,
    id_produit int,
    primary key(id),
    FOREIGN KEY (id_client) REFERENCES clients(id),
    FOREIGN key (id_produit) REFERENCES produits(id)

);

-- INSERTION DANS LA TABLE DES FAVORIS
insert into favoris (id_client, id_produit) values (1, 2),
                                                    (1, 3),
                                                    (1, 1),
                                                    (2, 2),
                                                    (3, 5),
                                                    (3, 6),
                                                    (4, 2),
                                                    (4, 1);

-- CREATION DE LA TABLE PANIERS
create table if not exists paniers(
    id int auto_increment,
    qty int not null,
    id_client int,
    id_produit int,
    primary key(id),
    FOREIGN KEY (id_client) REFERENCES clients(id),
    FOREIGN key (id_produit) REFERENCES produits(id)
);
-- INSERTION DANS LA TABLE DES PANIERS
insert into paniers (id_client, id_produit, qty) values (1, 2, 3),
                                                    (1, 3, 2),
                                                    (1, 1, 4),
                                                    (2, 2, 6),
                                                    (3, 5, 7),
                                                    (3, 6, 2),
                                                    (4, 2, 1),
                                                    (4, 1, 9);


--CREATION DE LA TABLE COMMENTAIRES
create table if not exists commentaires(
    id int auto_increment,
    contenu text not null,
    id_client int,
    id_produit int,
    primary key(id),
    FOREIGN key (id_client) REFERENCES clients(id),
    FOREIGN key (id_produit) REFERENCES produits(id)
);
-- INSERTION DANS LA TABLE COMMENTAIRES
insert into commentaires (id_client, id_produit, contenu) values (1, 1, 'had lproduit 3adk ziiin'),
                                                                    (2, 1, 'had lproduit 3adk khayb'),
                                                                    (3, 2, 'mafidkch'),
                                                                    (4, 4, 'woow'),
                                                                    (4, 5, 'nice');