** Les Jointures **

-- Nous aimerions connaitre les dates de sortie et de rendu pour l'abonné 'Guillaume' :

-- 1ère ligne : ce que je souhaite afficher.
-- 2ème ligne : de qu'elle table cela provient et de quelle table je vais avoir besoin.
-- 3ème ligne : JOINTURE (champ commun entre les tables qui permettent de faire la jointure) + les conditions.

* SELECT abonne.prenom, emprunt.date_rendu, emprunt.date_sortie
* FROM abonne, emprunt
* WHERE abonne.id_abonne = emprunt.id_abonne 
* AND abonne.prenom = 'Guillaume';


** Ref **

- https://www.ybierling.com/fr/blog-web-addforeignkeyphpmyadmin
- https://www.w3schools.com/sql/sql_foreignkey.asp
- https://www.sqlshack.com/learn-sql-join-multiple-tables/