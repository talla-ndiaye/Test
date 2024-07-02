use quizdb;
DROP TABLE IF EXISTS blogeurs;
CREATE TABLE IF NOT EXISTS blogeurs (
    id INT(255) NOT NULL AUTO_INCREMENT,
    nom_complet VARCHAR(255) NOT NULL DEFAULT '',
    username VARCHAR(255) NOT NULL DEFAULT '' unique,
    mot_de_passe VARCHAR(255) NOT NULL DEFAULT '' unique,
    email VARCHAR(255) NOT NULL DEFAULT '',
    PRIMARY KEY (id)
) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

insert into blogeurs (nom_complet,username,mot_de_passe,email) values ("talla ndiaye","talla",password("passer"),"nddjnd@sjnsj.fr");
insert into blogeurs (nom_complet,username,mot_de_passe,email) values ("Maraine Mbaye ","Marie",password("okay"),"nddjcnd@sjnsj.fr");
insert into blogeurs (nom_complet,username,mot_de_passe,email) values ("Yacine Diallo","yass",password("okay"),"nddjcnd@sjnsj.fr");
