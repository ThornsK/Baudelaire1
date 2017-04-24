CREATE DATABASE sallea;

CREATE TABLE IF NOT EXISTS salle (
	id_salle int(3) AUTO_INCREMENT,
	titre varchar(200),
	description text,
	photo varchar(200),
	pays varchar(20),
	ville varchar(20),
	adresse varchar(50),
	cp int(5),
	capacite int(3),
	categorie enum("réunion", "bureau", "formation"),
	PRIMARY KEY (id_salle)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS produit (
	id_produit int(3) AUTO_INCREMENT,
	id_salle int (3),
	date_arrivee datetime,
	date_depart datetime,
	prix int(3),
	etat enum("libre", "reservation"),
	PRIMARY KEY (id_produit)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS commande (
	id_commande int(3) AUTO_INCREMENT,
	id_membre int(3),
	id_produit int(3),
	date_enregistrement datetime,
	PRIMARY KEY (id_commande)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS avis (
	id_avis int(3) AUTO_INCREMENT,
	id_membre int(3),
	id_salle int(3),
	commentaire text,
	note int(2),
	date_enregistrement datetime,
	PRIMARY KEY (id_avis)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS membre (
	id_membre int(3)AUTO_INCREMENT,
	pseudo varchar(20),
	mdp varchar (60),
	nom varchar(20),
	prenom varchar(20),
	email varchar(50),
	civilite enum("m","f"),
	statut int(1),
	date_enregistrement datetime,
	PRIMARY KEY (id_membre)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;