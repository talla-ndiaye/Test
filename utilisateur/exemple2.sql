use quizdb;
DROP TABLE IF EXISTS blog;
CREATE TABLE IF NOT EXISTS blog (
    id INT(11) NOT NULL AUTO_INCREMENT,
    categorie VARCHAR(15) DEFAULT '' NOT NULL,
    auteur VARCHAR(30) DEFAULT '' NOT NULL,
    username VARCHAR(30) DEFAULT '' NOT NULL,
    titre VARCHAR(60) DEFAULT '' NOT NULL,
    date VARCHAR(30) DEFAULT '' NOT NULL,
    paragraphe1 TEXT DEFAULT '' NOT NULL,
    titre2 TEXT DEFAULT '' NOT NULL,
    paragraphe2 TEXT DEFAULT '' NOT NULL,
    titre3 TEXT DEFAULT '' NOT NULL,
    paragraphe3 TEXT DEFAULT '' NOT NULL,
    lien TEXT DEFAULT '' NOT NULL,
    image1 LONGBLOB NOT NULL,
    image2 LONGBLOB NOT NULL,
    PRIMARY KEY (id)
) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;


 
 insert into blog (categorie,auteur,username,titre,date,paragraphe1,titre2,paragraphe2,titre3,paragraphe3,lien) values ("personage",
"Ablaye ndiaye",
"Talla",
"Qui serigne Saliou ?",
"13 juin 2024",
"Léopold Sedar Senghor nait le 9 octobre 1902 a Joal, petite ville cotiere situee au sud de Mbour, Senegal. Son pere, Basile Diogoye Senghor, est un commerçant catholique. Originaire de Djilor, sa mere, Gnilane Ndieme Bakhoum, morte en 1948, que Senghor appelle dans elegies « Nyilane la douce », appartient a l'ethnie serere et a la lignee Tabor",
"oupq",
"Je sais que cette haute cour de justice, par essence et par sa composition, (ndlr : on y retrouve des deputes ayant vote la motion de censure), a deja prononce sa sentence, avant meme l’ouverture du proces (...) La participation de magistrats que sont le President (Ousmane Goundiam), le juge d’instruction (Abdoulaye Diop) et le procureur general ne sert qu’a couvrir du manteau de la legalite une execution sommaire deja programmee",
"etudes superieures",
"Senghor arrive a Paris en 1928. Cela marque le debut de « seize annees d’errance »,selon ses dires. Il y rencontre egalement Aime Cesaire pour la toute premiere fois. Il obtient en 1931 une licence de lettres",
"https://youtu.be/Ceel2mdRbWo?si=jxFy7pcP04twdh13");

