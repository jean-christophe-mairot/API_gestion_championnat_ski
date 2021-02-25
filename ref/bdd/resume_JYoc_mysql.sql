-- --------------------------------------------------------------------
-- -------------------------creation d'une BDD-------------------------
-- --------------------------------------------------------------------


-- base de données bibliotheque

-- table :
    -- livre
    -- abonne   
    -- emprunt

-- dans chaque table differents champs
-- toujours une id de ref par table

-- livre :
    -- id_livre
    -- titre
    --auteur

-- abonne :
    -- id_abonne
    -- prenom

-- emprunt :s
    -- id_emprunt
    -- id_abonne
    -- id_livre
    -- date_sortie
    -- date_rendu

-- --------------------------------------------------
CREATE DATABASE bibliotheque;

USE bibliotheque;


CREATE TABLE abonne (
  id_abonne INT(3) NOT NULL AUTO_INCREMENT,
  prenom VARCHAR(15) NOT NULL,
  PRIMARY KEY (id_abonne)
) ENGINE=InnoDB ;

    INSERT INTO abonne (id_abonne, prenom) VALUES
    (1, 'Guillaume'),
    (2, 'Benoit'),
    (3, 'Chloe'),
    (4, 'Laura');


CREATE TABLE livre (
  id_livre INT(3) NOT NULL AUTO_INCREMENT,
  auteur VARCHAR(25) NOT NULL,
  titre VARCHAR(30) NOT NULL,
  PRIMARY KEY (id_livre)
) ENGINE=InnoDB ;

    INSERT INTO livre (id_livre, auteur, titre) VALUES
    (100, 'GUY DE MAUPASSANT', 'Une vie'),
    (101, 'GUY DE MAUPASSANT', 'Bel-Ami '),
    (102, 'HONORE DE BALZAC', 'Le père Goriot'),
    (103, 'ALPHONSE DAUDET', 'Le Petit chose'),
    (104, 'ALEXANDRE DUMAS', 'La Reine Margot'),
    (105, 'ALEXANDRE DUMAS', 'Les Trois Mousquetaires');


CREATE TABLE emprunt (
  id_emprunt INT(3) NOT NULL AUTO_INCREMENT,
  id_livre INT(3) DEFAULT NULL,
  id_abonne INT(3) DEFAULT NULL,
  date_sortie DATE NOT NULL,
  date_rendu DATE DEFAULT NULL,
  PRIMARY KEY  (id_emprunt)
) ENGINE=InnoDB ;

    INSERT INTO emprunt (id_emprunt, id_livre, id_abonne, date_sortie, date_rendu) VALUES
    (1, 100, 1, '2014-12-17', '2014-12-18'),
    (2, 101, 2, '2014-12-18', '2014-12-20'),
    (3, 100, 3, '2014-12-19', '2014-12-22'),
    (4, 103, 4, '2014-12-19', '2014-12-22'),
    (5, 104, 1, '2014-12-19', '2014-12-28'),
    (6, 105, 2, '2015-03-20', '2015-03-26'),
    (7, 105, 3, '2015-06-13', NULL),
    (8, 100, 2, '2015-06-15', NULL);




-- --------------------------------------------------------------------------------------
-- ---------------------------  LES REQUETES SQL  ---------------------------------------
-- --------------------------------------------------------------------------------------


-- Les requêtes SQL ne sont pas sensibles à la casse, mais par convention il faut indiquer les mot clés du langages SQL en MAJUSCULE !

-- Chaque requête se terminera TOUJOURS par un point virgule !!!

-- Commande à exécuter sur le terminal pour débuter :

	-- mysql -u root -p (et ensuite cliquer sur 'entrée' lors de la demande du mdp)

	-- /Applications/MAMP/Library/bin/mysql -u root -p (pour MAC mdp : 'root') 

-- -------------------------------------------------------------------------------------
CREATE DATABASE entreprise; -- creation d'une nouvelle base de données

SHOW DATABASES; -- permet de voir toutes les BDD

USE entreprise; -- permet de sélectionner la BDD et de pouvoir travailler dessus

DROP DATABASE entreprise; -- permet de supprimer une BDD

DROP TABLE nom_de_la_table; -- permet de supprimer une table

TRUNCATE nom_de_la_table; -- permet de vider un table

-- -------------------------------------------------------------------------------
-- requête d'affichage (SELECT)

SELECT id_employes, nom, prenom, service, date_embauche, sexe, salaire FROM employes;

SELECT * FROM employes; -- sélectionne moi toutes les informations provenant de ma table 'employes'

-- Affichage du nom et prénom des employés de l'entreprise :
SELECT prenom, nom FROM employes;

-- --------------------------------------
-- DISTINCT : permet d'éliminer les doublons 
-- Affichage des différents services de l'entreprise :
SELECT DISTINCT(service) FROM employes;

-- --------------------------------------
-- Condition WHERE :
-- Affichage des employés du service informatique :
SELECT nom, prenom, service FROM employes WHERE service = 'informatique';

-- --------------------------------------
-- BETWEEN : 
-- Affichage des employés ayant été recruté entre 2015 et aujourd'hui :
SELECT nom, prenom, date_embauche FROM employes WHERE date_embauche BETWEEN '2015-01-01' AND '2019-12-16';

-- Affichage de la date du jour :
SELECT CURDATE();

SELECT nom, prenom, date_embauche FROM employes WHERE date_embauche BETWEEN "2015-01-01" AND CURDATE();

-- Pas de différence entre les guillemets ou les quotes, en revanche, s'il s'agit d'un chiffre, on ne doit pas en mettre !
-- ---------------------------------------
-- LIKE : valeur approchante
-- Affichage des employés ayant un prénom commençant par la lettre 's':
SELECT prenom FROM employes WHERE prenom LIKE 's%';

	-- % signifie : "peu importe la suite"

-- Affichage des employés ayant un prénom se terminant par la lettre 's':
SELECT prenom FROM employes WHERE prenom LIKE '%s';

-- Affichage des employés ayant un prénom contenant un tiret '-':
SELECT prenom FROM employes WHERE prenom LIKE '%-%';

-- --------------------------------------- 
-- Affichage de tous les employés SAUF les informaticiens :
SELECT nom, prenom, service FROM employes WHERE service != 'informatique';

-- != : "différent de..."

-- --------------------------------------- 
-- Affichage de tous les employés ayant un salaire supérieur à 3000 € :
SELECT nom, prenom, salaire FROM employes WHERE salaire > 3000 ;

-- --------------------------------------- 
-- ORDER BY : (tri)
-- Affichage des employés dans l'ordre alphabétique :
SELECT prenom FROM employes ORDER BY prenom ASC;
SELECT prenom FROM employes ORDER BY prenom DESC;

-- ASC : Ascendant => ordre croissant
-- DESC : Descendant => ordre décroissant

SELECT salaire, prenom FROM employes ORDER BY salaire DESC, prenom ASC;

-- ------------------------------------
-- LIMIT : (pagination)
-- Afficahge des employés 3 par 3 :
SELECT prenom FROM employes ORDER BY prenom ASC LIMIT 0, 3; -- affiche le 0, 1 et 2
SELECT prenom FROM employes ORDER BY prenom ASC LIMIT 3, 3; -- affiche le 3, 4 et 5
SELECT prenom FROM employes ORDER BY prenom ASC LIMIT 6, 3; -- affiche le 6, 7 et 8

-- LIMIT x , y ;
	-- x : d'où on commence
	-- y : combien on affiche

-- ------------------------------------
-- AS : (Alias) : permet de renommer un champ
-- Affichage des employés avec leur salaire annuel :
SELECT prenom, salaire*12 FROM employes;
SELECT prenom, salaire*12 AS 'Salaire annuel' FROM employes;

-- ------------------------------------
-- SUM() : (somme)
-- Affichage de la masse salariale de l'entreprise sur 1 an
SELECT SUM( salaire*12 ) AS "Masse salariale" FROM employes;

-- ------------------------------------
-- AVG() : (moyenne)
-- Affichage du salaire moyen :
SELECT AVG( salaire ) FROM employes;

-- ------------------------------------
-- ROUND() : (arrondir)
-- Affichage le salaire moyen annuel arrondi :
SELECT ROUND( AVG( salaire ), 2 ) FROM employes;

-- ------------------------------------
-- COUNT() : 
-- Affichage du nombre de femme(s) dans l'entreprise :
SELECT COUNT(*) FROM employes WHERE sexe = 'f';

-- ------------------------------------
-- MIN / MAX
-- Affichage du salaire le plus bas et du salaire le plus haut :
SELECT MIN( salaire ) FROM employes; -- 1390
SELECT MAX( salaire ) FROM employes; -- 5000

-- Affichage de la personne qui a le salaire le plus bas  :
SELECT prenom, MIN( salaire ) FROM employes;
 -- INCOHERENCE !!! Ce n'est pas Jean-pierre qui gagne le salaire le plus bas mais c'est bien Julien Cottet !!

-- Qui gagne le salaire le plus bas :
SELECT prenom, salaire FROM employes WHERE salaire = 
	( SELECT MIN( salaire ) FROM employes );

-- Affichage des employés travaillant dans les services info et compta :
SELECT prenom, service FROM employes WHERE service IN ('comptabilite', 'informatique');

	-- 'IN' : permet d'inclure plusieurs résultats
	-- '=' : permet d'inclure une seule valeur

-- Affichage des employés NE travaillant PAS dans les services compta ou info :
SELECT prenom, service  FROM employes WHERE service NOT IN ('comptabilite', 'informatique');

	-- 'NOT IN' : permet d'exclure plusieurs résultats
	-- '!=' : permet d'exclure une seule valeur

-- -----------------------------------------
-- AND : ajouter des conditions supplémentaires :
-- Affichage des commerciaux gagnant un salaire inférieur ou égal à 2000 € :
SELECT prenom, service, salaire
FROM article
WHERE service = 'commercial'
AND salaire <= 2000;

-- -----------------------------------------
-- OR : 
-- Affichage des prénoms des employés du service commercial travaillant pour un salaire de 1900 ou 2300 €
SELECT prenom, service, salaire
FROM employes
WHERE service = 'commercial'
AND salaire = 1900 OR salaire = 2300;

-- -----------------------------------------
-- GROUP BY : permet de regrouper des informations
-- Affichage du nombre d'employés par service :
SELECT service, COUNT(*) AS "Nombre d'employes" FROM employes GROUP BY service;

-- Affichage des services où il y a plus de 2 personnes dans le service :
SELECT service, COUNT(*) AS "Nombre d'employes" FROM employes GROUP BY service HAVING COUNT(*) > 2;

	-- Cas particulier :on utlise 'HAVING' dans le cas d'un 'GROUP BY' pour appliquer une condition

-- ---------------------------------------------------------------------------------
-- REQUETE D'INSERTION : INSERT
INSERT INTO employes VALUES(NULL, 'Marco', 'Polo', 'm', 'voyageur', '2019-01-01', 1234);

INSERT INTO employes(prenom, sexe, service, nom, salaire, date_embauche) VALUES ('Bob', 'm', 'musicien', 'Marley', 4561, '2016-01-01');

-- ---------------------------------------------------------------------------------
-- REQUETE DE MODIFICATION : UPDATE
SELECT * FROM employes;

UPDATE employes SET salaire = 2500 WHERE id_employes = 993;

UPDATE employes SET salaire = 3200, service = 'direction', nom = 'Chirac' WHERE id_employes = 993;

-- ------------------------------
	INSERT INTO employes VALUES(1111, 'test', 'test', 'f', 'test', '2010-01-01', 1111 );

	REPLACE INTO employes VALUES(NULL, 'oui', 'oui', 'm', 'oui', '2010-02-03', 2323 );
	-- insertion

	REPLACE INTO employes VALUES(1111, 'non', 'non', 'm', 'non', '2010-02-03', 7575 );
	-- modification

	-- REPLACE : se comporte comme un 'UPDATE' si l'id est trouvée, sinon il se comporte comme un 'INSERT'

-- -------------------------------------------------------------------------------------
-- REQUETE DE SUPPRESSION : DELETE 
DELETE FROM employes WHERE id_employes = 1112;

DELETE FROM employes WHERE prenom = 'Bob';
-- Suppression de l'employé ayant le prénom 'Bob'. Nous sommes dans un exmeple donc c'est 'ok' MAIS ce serait plus prudent d'utiliser son 'id' car si il y a plusieurs 'Bob' dans la table et bien ils seraient tous supprimés.

DELETE FROM employes WHERE service = 'informatique' AND id_employes != 701;
-- Ici, on supprime tous les informaticiens SAUF celui qui possède l'id 701.

DELETE FROM employes; -- => revient à faire un : "TRUNCATE employes;"

DELETE FROM employes WHERE id_employes = 701 OR id_employes = 547;
-- suppression de 2 employés qui n'ont pas de point commun. Il s'agit d'un 'OR' et non aps d'un 'AND' car 1 employés ne peut pas avoir 2 id en même temps !



-- ----------------------------------------------------------------------------------------------
-- ------------------ REQUETES IMBRIQUES ET JOINTURE ------------------------------------------
-- -----------------------------------------------------------------------------------------------



-- Afficher les numéros des livres qui n'ont pas été rendu :
SELECT id_livre FROM emprunt WHERE date_rendu IS NULL; -- 100 et 105

-- Lorsque l'on compare la valeur 'NULL', il faut utiliser le mot clé 'IS' et non pas le '=' !!
-- => Un champ NULL se teste avec IS !

-- ------------------------------------------------------------------------------------------------------
-- REQUETES IMBRIQUEES : (sur plusieurs tables)

-- Affichez les titres des livres qui n'ont pas été rendu : ('Une vie', 'Les trois mousquetaires')
SELECT titre FROM livre WHERE id_livre IN 
-- Affiche moi le titre provenant de ma table 'livre' à condition que l'id_livre soit égale à :

	( SELECT id_livre FROM emprunt WHERE date_rendu IS NULL ); -- 100 et 105
	-- Affiche moi l'id_livre des livres de ma table 'emprunt' qui n'ont pas été rendu

-- ------------------------------------------------------
-- Affichez les prénoms des abonnés qui n'ont pas rendu de livres : ('Chloe', 'Benoit')
SELECT prenom FROM abonne WHERE id_abonne IN 
-- Affiche moi le prénom provenant de ma table 'abonne' à condition que l'id_abonne soit égale à :

	( SELECT id_abonne FROM emprunt WHERE date_rendu IS NULL ); -- 2 et 3
	-- Affiche moi l'id_abonne de ma table 'emprunt' à condition que la date de rendu est NULL

-- ------------------------------------------------------
-- Affichez le n° des livres que Chloé a emprunté : (100 et 105)
SELECT id_livre FROM emprunt WHERE id_abonne = 
-- Affiche moi l'id_livre provenant de ma table 'emprunt' à condition que l'id_abonne soit égale à :

	( SELECT id_abonne FROM abonne WHERE prenom = 'Chloe' ); -- 3
	-- Affiche moi l'id_abonne de ma table 'abonne' à condition que le prénom soit égal à Chloé

-- Afin de réaliser des requêtes imbriquées ( ou des jointures ) il faut OBLIGATOIREMENT un champ commun entre les tables !!

-- --------------------------------------------------------------------------------------------
-- --------------------------------------------------------------------------------------------
-- JOINTURES : 
-- Différence entre jointure et requêtes imbriquées : les deux permettent de faire des relations entre les différentes tables afin d'avoir des colonnes associées pour ne former qu'un seul résultat.

	-- Une jointure sera possible DANS TOUS LES CAS !!
	-- Des requêtes imbriquées seront possibles seulement dans le cas où le resultat est issue d'une seule table
		-- Dans ce cas précis, bien qu'une jointure soit possible, les requêtes imbriquées auront l'avantage de s'exécuter plus rapidement.

-- Nous aimerions connaitre les dates de sortie et de rendu pour l'abonné 'Guillaume' :
SELECT abonne.prenom, emprunt.date_rendu, emprunt.date_sortie
FROM abonne, emprunt
WHERE abonne.id_abonne = emprunt.id_abonne 
AND abonne.prenom = 'Guillaume';

-- 1ère ligne : ce que je souhaite afficher
-- 2ème ligne : de quelle table cela provient et de quelle table je vais avoir besoin
-- 3ème ligne : JOINTURE (champ commun entre les tables qui permettent de faire la jointure) + les conditions 




-- Jointure entre enfant epreuves, parent categories

SELECT epreuves.nom_epreuve, epreuves.date_epreuve, categories.type
FROM epreuves, categories
WHERE epreuves.id_categorie = categories.id_categorie;
-- AND epreuves.nom_epreuve = 'La Descente des Alpes - M1';

-- Jointure categories

SELECT categories.type
FROM categories, passages
WHERE passages.id_categorie = categories.id_categorie;
-- AND categories.type = 'M1';

-- Join epreuves, categories

SELECT epreuves.*, categories.*
FROM epreuves, categories, passages
WHERE epreuves.id_categorie = categories.id_categorie;
-- AND epreuves.nom_epreuve = 'La Descente des Alpes - M2';

-- Join participants

SELECT participants.*
FROM participants, passages
WHERE participants.id_participant = participants.id_participant;
-- AND epreuves.nom_epreuve = 'La Descente des Alpes - M2';

-- nom epreuve, catégorie, meilleur temps, nom du participant, img participant, 




-- 2ème version : identique à celle du dessus mais en plus courte :
SELECT a.prenom, e.date_sortie, e.date_rendu
FROM abonne a, emprunt e
WHERE a.id_abonne = e.id_abonne
AND a.prenom = 'Guillaume';

-- A la deuxième ligne, on "renomme" les tables avec une "abréviation" (alias)

-- Version imbriquée :
SELECT date_rendu, date_sortie FROM emprunt WHERE id_abonne =
	( SELECT id_abonne FROM abonne WHERE prenom = 'Guillaume' );

-- --------------------------------------------------------------------------------------------
-- --------------------------------------------------------------------------------------------
-- JOINTURES EXTERNES : (sans correspondance exigée)

-- => Rajouter un abonne dans la table abonne :
	INSERT INTO abonne(prenom) VALUES ('Jeremie');

-- Afficher les prénoms des abonnés et les n° des livres qu'ils ont emprunté :
SELECT abonne.prenom, emprunt.id_livre 
FROM abonne, emprunt
WHERE abonne.id_abonne = emprunt.id_abonne;
-- 'Jeremie' n'apparait pas dans la liste 

SELECT a.prenom, e.id_livre
FROM abonne a LEFT JOIN emprunt e
ON a.id_abonne = e.id_abonne;

-- la clause LEFT JOIN permet de rappatrier toutes les données de la table considérée comme étant à gauche (ici, 'abonne')

-- ----------------------------------------------------------------------------------------------
-- UNION :
-- UNION : permet de fusionner 2 résultats dans une même liste de résultat :
SELECT auteur AS 'liste de personne physique' FROM livre
	UNION ALL
		SELECT prenom FROM abonne;	

-- permet d'afficher les prénoms des abonnées dans la même liste que les noms des auteurs.

-- La requête UNION ne sortira pas deux enregistrements nommés de la même manière pour se faire il faudrait utiliser :
	UNION ALL

	-- (UNION est un UNION DISTINCT par défaut)




-- ------------------------------------------------------------------------------
-- ---------------------- FONCTION ET VARIABLES ---------------------------------
-- ------------------------------------------------------------------------------
-- ---------------------- FONCTIONS PREDEFINIES ---------------------------------



SELECT DATABASE(); -- indiqque la base de donnes actuellement selectionnee
SELECT VERSION(); -- indique la version mysql

INSERT INTO abonne(prenom) VALUES ('Manon'); -- insertion
SELECT LAST_INSERT_ID();-- peremt d'afficher le dernier identifiant insere

SELECT ADDDATE('2019-12-18', 31); -- 31 = 31 jours plus tard

SELECT CURDATE(); -- retourne la date du jour au format US
SELECT CURTIME(); -- retourne l heure courante hh mm ss

SELECT DATE_FORMAT('2019-12-18', '%d/%m/%Y'); --  change le format de la date

SELECT DATE_FORMAT(date_rendu, '%d/%m/%Y') FROM emprunt; -- exemple date rendu au forma d/m/y

SELECT DAYNAME('2011-01-01'); -- affiche le jour d'une date particulier
SELECT DAYNAME(CURDATE());-- affiche la jour de la date du jour

SELECT DAYOFYEAR(CURDATE());-- affiche le numero du jour j

SELECT NOW(); -- affiche la date et l'heure du jour

SELECT PASSWORD('monmotdepasse');-- crypter le mot de passe à l'interieur des parentheses

SELECT CONCAT('a','b','c'); -- concatenation

SELECT CONCAT_WS('=>', 'premier', 'deuxieme'); -- concaténation où l'on détermine un separateur

SELECT LENGTH('salut'); -- retourne la longueur de la chaine de caractere

SELECT LOCATE("j", "aujourd'hui"); -- localise la lettre 'j' dans le mot "aujourd'hui"

SELECT REPLACE('www.wf3.fr', 'w', '@'); -- touss les w sont remplcé par des @

SELECT TRIM('       coucou      '); -- enleve les espaces

SELECT UPPER('majuscule'); -- fait passer en majuscule



-- ------------------------------------------------------------------------------
-- --------------------------- FONCTION UTILISATEUR ---------------------------
-- ---------------------------- A REVOIR --------------------------------------
DELIMITER $ -- ici on change le delimiter, car en inscrivant la fonction, on devra inscrire des ; alors qu'il ne sagit pas de la fin de la fonction
-- on dit a la console quelle ne doit pas executé tant qu'il n'y a pas de $ on remplace (; par $)

CREATE FUNCTION calcul_tva(nb INT) RETURNS TEXT

    COMMENT 'Fonction permettant de calculer une TVA'
    READS SQL DATA

        BEGIN   
            RETURN CONCAT_WS(':','Le resultat est',(nb*1.2));
        END $

-- NO SQL : indique que la fonction ne contient aucune instruction SQL
-- CONTAINS SQL : indique que la fonction contient des instructions SQL qui n'effectuent ni lecture ni modification (valeur par défaut)
-- READS SQL DATA : indique que la fonction contient des instructions de type SELECT ou FETCH (ne fait que lire les données)
-- MODIFIES SQL DATA : indique que la fonction contient des instructions INSERT, DELETE ou UPDATE

DELIMITER ;-- on change a nouveau pour remettre le ;

SELECT calcul_tva(1000);

SHOW FUNCTION STATUS; -- permet de voir les fonctions déclarées
DROP FUNCTION calcul_tva;-- supprime la fonction tva

-- ----------------------------------------------------------------------------------------

