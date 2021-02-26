



-- Nous aimerions connaitre les dates de sortie et de rendu pour l'abonné 'Guillaume' :
SELECT epreuves.nom_epreuve, epreuves.date_epreuve, categories.type
FROM epreuves, categories
WHERE epreuves.id_categorie = categories.id_categorie 

-- 1ère ligne : ce que je souhaite afficher
-- 2ème ligne : de quelle table cela provient et de quelle table je vais avoir besoin
-- 3ème ligne : JOINTURE (champ commun entre les tables qui permettent de faire la jointure) + les conditions 




-- Jointure entre enfant epreuves, parent categories
SELECT epreuves.nom_epreuve, epreuves.date_epreuve, categories.type
FROM epreuves, categories
WHERE epreuves.id_categorie = categories.id_categorie;


-- Jointure categories
SELECT categories.type
FROM categories, passages
WHERE passages.id_categorie = categories.id_categorie;


-- Join epreuves, categories
SELECT epreuves.*, categories.*
FROM epreuves, categories, passages
WHERE epreuves.id_categorie = categories.id_categorie;


-- Join participants
SELECT participants.*
FROM participants, passages
WHERE participants.id_participant = participants.id_participant;




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