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
insert into produits (nom, prix, stock, image, id_categorie) values ('Gigabyte Z690 AORUS PRO DDR5', 4190, 5, '1.png', 2),
                                                                    ('AMD Ryzen 7 5800X3D (3.4 Ghz / 4.5 Ghz)', 5990, 10, '2.png', 2),
                                                                    ('Asus ROG STRIX GeForce RTX 3080 O12G GAMING LHR', 17900, 3, '3.png', 2),
                                                                    ('PNY GeForce RTX 3050 8GB XLR8 Gaming REVEL EPIC-X', 4590, 8, '4.png', 2),
                                                                    ('Ducky Channel One 2 Mini RGB Noir – Brown Switch', 1290, 2, '5.png', 3),
                                                                    ('Asus ProArt PA278QV', 5290, 10, '6.png', 3),
                                                                    ('MSI Optix MAG251RX', 5190, 10, '7.png', 3),
                                                                    ('MSI MAG X570S TORPEDO MAX', 3549, 10, '8.png', 2);
                                   
-- CREATION DE LA TABLE DES DESCRIPTIONS
create table if not exists descriptions(
    id int auto_increment,
    contenu text not null,
    id_produit int,
    primary key(id),
    FOREIGN key (id_produit) REFERENCES produits(id)
);

-- INSERTION DANS LA TABLE DES DESCRIPTIONS
insert into descriptions (id_produit, contenu) values (1, 'Désignation: Gigabyte Z690 AORUS PRO DDR5'),
                                                        (1, 'Support du Processeur: Intel 1700'),
                                                        (1, 'Format de Mémoire: 4 X DIMM 288 pins (DDR5)'),
                                                        (1, 'Fréquence Mémoire: DDR5 6200 MHz'),
                                                        (1, 'Nombre et type de slots: Aucun'),
                                                        (1, 'Format: ATX'),
                                                        (2, 'Modèle de processeur : AMD Ryzen 7 5800X'),
                                                        (2, 'Fréquence CPU : 3.8 Ghz'),
                                                        (2, 'Fréquence en mode Turbo : 4.7 Ghz'),
                                                        (2, 'Nombre de Cœurs : 8'),
                                                        (2, 'Nombre de Threads : 16'),
                                                        (2, 'Contrôleur graphique intégré : Non'),
                                                        (2, 'Chipset graphique : Aucun'),
                                                        (2, 'Fréquence(s) Mémoire : DDR4 3200Mhz / DDR5 4800Mhz'),
                                                        (3, 'Désignation : Asus ROG STRIX GeForce RTX 3080 O12G GAMING LHR'),
                                                        (3, 'Modèle :  90YV0FAC-M0NM00'),
                                                        (3, 'Chipset Graphique : NVIDIA'),
                                                        (3, 'Fréquence Boostée: 1890 MHz'),
                                                        (3, 'Overclockée: Oui'),
                                                        (3, 'Bus: PCI Express 4.0 16x'),
                                                        (3, 'Sorties Vidéo: 3 X DisplayPort Femelle + 2 X HDMI Femelle'),
                                                        (4, 'Désignation : PNY GeForce RTX 3050 8GB XLR8 Gaming REVEL EPIC-X RGB'),
                                                        (4, 'Modèle :  VCG30508SFXPPB'),
                                                        (4, 'Chipset Graphique : NVIDIA'),
                                                        (4, 'Fréquence du Chipset: 1552 MHz'),
                                                        (4, 'Fréquence Boostée: 1777 MHz'),
                                                        (4, 'Overclockée: Non'),
                                                        (4, 'Bus: PCI Express 4.0 16x'),
                                                        (4, 'Sorties Vidéo: 3 X DisplayPort Femelle + 1 X HDMI Femelle'),
                                                        (5, 'Désignation: Ducky Channel One 2 Mini RGB Noir – Brown Switch'),
                                                        (5, 'Format: Normal'),
                                                        (5, 'Norme du clavier: Azerty'),
                                                        (5, 'Sans Fil: Non'),
                                                        (5, 'Type de touches: Mécanique'),
                                                        (5, 'Rétro-éclairage: Oui'),
                                                        (5, 'Touches multimédia: Non'),
                                                        (5, 'Pave numérique: Non'),
                                                        (5, 'Couleur: Noir'),
                                                        (5, 'Type alimentation: Port USB'),
                                                        (6, 'Désignation: ASUS 27″ LED – ProArt PA278QV'),
                                                        (6, 'Taille de l’écran: 27 pouces'),
                                                        (6, 'Format de l’écran: 16/9'),
                                                        (6, 'Type de dalle: Dalle IPS'),
                                                        (6, 'Résolution Max: 2560 x 1440 pixels'),
                                                        (6, 'Temps de réponse: 5 ms'),
                                                        (6, 'Taux de rafraichissement: 75 Hz'),
                                                        (7, 'Désignation: MSI 24.5″ LED – Optix MAG251RX'),
                                                        (7, 'Taille de l’écran: 24.5 pouces'),
                                                        (7, 'Format de l’écran: 16/9'),
                                                        (7, 'Type de dalle: Dalle IPS'),
                                                        (7, 'Résolution Max: 1920*1080'),
                                                        (7, 'Temps de réponse: 1ms'),
                                                        (7, 'Taux de rafraichissement: 240Hz'),
                                                        (8, 'Désignation: MSI MAG X570S TORPEDO MAX'),
                                                        (8, 'Support du Processeur: AMD AM4'),
                                                        (8, 'Format de Mémoire: 4 X DIMM 288 pins (DDR4)'),
                                                        (8, 'Fréquence Mémoire: DDR4 5100 MHz'),
                                                        (8, 'Nombre et type de slots: 2 X PCI Express 3.0 1x'),
                                                        (8, 'Format: ATX');
                                                        

-- CREATION DE LA TABLE DES CLIENTS
create table if not exists clients(
    id int auto_increment,
    nom varchar(50) not null,
    prenom varchar(50) not null,
    adresse_1 varchar(255) not null,
    adresse_2 varchar(255),
    telephone varchar(50),
    email varchar(255) not null,
    mdp varchar(255) null,
    primary key(id)
);

-- INSERTION DANS LA TABLE DES CLIENTS
insert into clients (nom, prenom, adresse_1, telephone, email, mdp) values ('elyatim', 'badr', 'Derb Ghallef', '0655102683', 'flipbadr7@gmail.com', '12345678'),
                                                                            ('bahmou', 'aicha', 'Hay Moulay Abd Allah', '0690856979', 'aichabahmou04@gmail.com', '12345678'),
                                                                            ('saadi', 'ahlame', 'Ain Chock', '0695007713', 'ahlame@gmail.com', '12345678'),
                                                                            ('abir', 'hanaa', 'EL Oulfa', '0777890417', 'abirhanaa7@gmail.com', '12345678');

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
