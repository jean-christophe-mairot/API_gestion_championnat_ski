-- *********************************Les Jointure*****************************************

-- ************************************Exemple*****************************************
-- Nous aimerions connaitre les dates de sortie et de rendu pour l'abonné 'Guillaume' :
SELECT epreuves.nom_epreuve, epreuves.date_epreuve, categories.type
FROM epreuves, categories
WHERE epreuves.id_categorie = categories.id_categorie 

-- 1ère ligne : ce que je souhaite afficher
-- 2ème ligne : de quelle table cela provient et de quelle table je vais avoir besoin
-- 3ème ligne : JOINTURE (champ commun entre les tables qui permettent de faire la jointure) + les conditions 


-- ***********************************Fin Exemple***************************************


-- Jointure entre enfant table epreuves, parent table categories
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

