# lunarPhase : guide d'utilisation

lunarPhase ajoute un gadget qui affiche la phase actuelle de la Lune, ses caractéristiques du moment et les dates des prochaines phases.

## Table des matières

1. [Ajouter le gadget](#ajouter-le-gadget)
2. [Les informations affichées](#les-informations-affichées)
3. [Les réglages](#les-réglages)
4. [Bon à savoir](#bon-à-savoir)

## Ajouter le gadget

Allez dans **Gadgets**, ajoutez « Phases de la Lune » à la zone de votre choix (par exemple « Extra »), puis enregistrez.

Sur le blog, le gadget affiche deux parties : « En direct » et « Prévisions ».

![Gadget public](img/gadget-public.png)

## Les informations affichées

La partie **En direct** donne, au moment de l'affichage :

* la phase de la Lune (avec une petite image) ;
* son illumination, en pourcentage ;
* son âge, en jours ;
* sa distance à la Terre et au Soleil, en kilomètres ;
* l'angle de la Lune et du Soleil, et la parallaxe de la Lune, en degrés.

La partie **Prévisions** liste les dates et heures des prochaines phases : nouvelle lune, premier quartier, pleine lune, dernier quartier, etc. L'heure est celle du fuseau horaire du blog. Au survol d'une ligne, le nom de la phase apparaît.

Les petites images sont ajoutées par la feuille de style du plugin, quelle que soit la zone du thème où se trouve le gadget.

## Les réglages

Cliquez sur le nom du gadget pour déplier ses réglages.

![Réglages du gadget](img/gadget-reglages.png)

* **Titre** : le titre du gadget.
* Une case par information de la partie « En direct » : phase, illumination, âge, distance à la Terre, distance au Soleil, angle de la Lune, angle du Soleil, parallaxe. Décochez celles que vous ne voulez pas.
* **Afficher toutes les prévisions** des prochaines phases de la Lune.
* Les options habituelles des gadgets : page d'accueil seulement, contenu seul, classe CSS, hors ligne.

Si vous décochez toutes les informations « En direct » et les prévisions, seul le titre reste affiché.

## Bon à savoir

* Les nombres suivent la langue du blog : en français, `403 367 km` et `0,49 deg`.
* La partie « Prévisions » ne liste que des phases à venir.
* Les angles et la parallaxe sont donnés en degrés : environ 0,5° pour la taille apparente de la Lune et du Soleil, environ 1° pour la parallaxe de la Lune.
