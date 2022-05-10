create database if not exists ecom;

use ecom;

-- CREATION DE LA TABLE DES CATEGORIES
create table if not exists categories(
    id int auto_increment,
    nom varchar(50),
    primary key(id)
);

-- CREATION DE LA TABLE DES PRODUITS
create table if not exists produits(
    id int auto_increment,
    nom varchar(50),
    prix double,
    stock int,
    image varchar(255),
    id_categorie int,
    primary key(id),
    FOREIGN KEY (id_categorie) REFERENCES categories(id)
);

-- CREATION DE LA TABLE DES DESCRIPTIONS
create table if not exists descriptions(
    id int auto_increment,
    contenu text,
    id_produit int,
    primary key(id),
    FOREIGN key (id_produit) REFERENCES produits(id)
);

-- CREATION DE LA TABLE DES CLIENTS
create table if not exists clients(
    id int auto_increment,
    nom varchar(50),
    prenom varchar(50),
    adresse_1 varchar(255),
    adresse_2 varchar(255),
    telephone varchar(50),
    email varchar(255),
    primary key(id)
);

