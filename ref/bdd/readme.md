**Les-Jointures**

_Différence entre jointure et requêtes imbriquées : les deux permettent de faire des relations entre les différentes tables afin d'avoir des colonnes associées pour ne former qu'un seul résultat_

_La jointure, c'est une façon de recup des données à partir de plusieurs table reposant sur des propriétées à vérifier (des tests à valider) pour que les données de l'une ou l'autre des tables soient retournées dans le set du résultat. La plupart du temps, ces tests sont simplement effectués entre des colonnes de type clé-primaire<->clé-étrangère._

**Type-de-Jointure**

- INNER JOIN :

_Retourne toutes les occurrences de tes 2 tables jointées si le test est vérifié pour l'une et l'autre des tables._

- LEFT JOIN :

_Retourne toutes les occurrences de la table à gauche [souvent celle qui se trouve indiquée dans le FROM pour une jointure simple] et les occurrences de ta table de droite qui vérifient le test donné._

- RIGHT JOIN :

_Pareil que LEFT JOIN mais inversé. Retourne toutes les occurrences de la table à droite [celle sur laquelle on fais la jointure, située après le JOIN] et les occurrences de la table de gauche qui vérifient le prédicat donné._

- FULL JOIN :

_Retourne toutes les occurrences des 2 tables jointées si le prédicat est vérifié pour l'une ou l'autre de tes tables._

**Exemple**

- 1ère ligne :
  _Ce que je souhaite afficher._

- 2ème ligne :
  _De qu'elle table cela provient et de quelle table je vais avoir besoin._

- 3ème ligne :
  _JOINTURE (champ commun entre les tables qui permettent de faire la jointure) + les conditions._

SELECT epreuves.nom_epreuve, epreuves.date_epreuve, categories.type
FROM epreuves, categories
WHERE epreuves.id_categorie = categories.id_categorie;

**Les-Clé-étrangère**
_ou_
**FOREIGN KEY**

_Une Fk assure de lier deux tables par deux champs en les contraignant à être identique._

_Il s'agit d'une contrainte que tu vas appliquer à une colonne d'une table en indiquant que pour que ta donnée existe dans la colonne clé-étrangère, il faut impérativement (le but des contraintes : forcer des valeurs) que celle-ci existe également dans une autre colonne d'une table donnée._

**Un-Exemple**

- table_1 _Table Parent_ _Référancant_

  - id_t1
  - name_t1
  - year_t1

- table_2 _Table enfant_ _Référancé_
  - id_t2
  - name_t2
  - years_t2
  - id_t1 _id_t1 est la fk de la table_1_ _doit avoir le meme type de donnée et le meme nom de colonne_

_Dans cet exemple les deux table comunique entre elles par la fk id_t1 la valeur contenu dans cette table devra toujour correspondre à celle de la table parente_

**Comment-creer-une-fk-sur-php-my-admin**

- Cliquer sur la db ou on veut que la fk soit creer.

- Aller sur la table, que l'on veut voir devenir la table enfant.

- Creer une colonne pouvant accueillir la fk qui sera du même type et du meme nom que la colonne de la table parent que l'ont vas linker.

- Aller maintenant sur la colonne que l'on veut voir devenir la table parent.

- Cliqué sur l'onglet "Structure", puis sur "Vue relationnelle".

- La on doit remplir les champs vide.
  _Enfant_ _Parent_
  - "Nom de la contrainte" Par convention la contrainte se nomme avec le nom des deux table: exemple: fk_table_1_table_2 .
  - ON NE TOUCHE PAS A ON DELETE ON UPDATE SI ON NE SAIS PAS LES OPTION.
  - On précise la colonne ou la fk vas sincéré.
  - La base de données ou on est.
  - On insère la Table parent.
  - et on Insère la colonne qui sera linker à notre fk de notre table enfant.

**Ref**

- https://www.ybierling.com/fr/blog-web-addforeignkeyphpmyadmin
- https://www.w3schools.com/sql/sql_foreignkey.asp
- https://www.sqlshack.com/learn-sql-join-multiple-tables/
- https://fr.wikipedia.org/wiki/Cl%C3%A9_%C3%A9trang%C3%A8re#:~:text=Une%20cl%C3%A9%20%C3%A9trang%C3%A8re%2C%20dans%20une,table%20(la%20table%20r%C3%A9f%C3%A9renc%C3%A9e).
