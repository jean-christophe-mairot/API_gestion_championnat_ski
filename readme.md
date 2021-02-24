**pour le pull**

- git pull

**pour le push**

- git add \*
- git commit -m "la raison du commit"
- git push -u origin main

**changer de branche**

- git checkout jc(pour être sur la branche jc)

**revenir sur la bracnch main**

- git checkout main

**si je dev sur la branch jc et que je veux push sur main**

- git add \*
- git commit -m "la raison du commit"
- git checkout main
- git merge jc
- git push -u origin main

**créez un nouveau référentiel**

- git init
- git add README.md
- git commit -m "first commit"
- git branch -M main
- git remote add origin https://github.com/jean-christophe-mairot/API_gestion_championnat_ski.git
- git push -u origin main

**Ou pousser un référentiel existant depuis la ligne de commande**

- git remote add origin https://github.com/jean-christophe-mairot/API_gestion_championnat_ski.git
- git branch -M main
- git push -u origin main

**Liens utiles**

- https://trello.com/b/CZlpTirh/api/timeline
- https://phpspreadsheet.readthedocs.io/en/latest/

- Yoann is here
- Celia is here
- Teedji is here
- Saufiane is here
- jc is here
