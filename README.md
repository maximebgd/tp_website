# TP - Ingénierie du Web

Bonjour Monsieur,

Voici le répertoire GitHub des 2 TP que nous avons dû réaliser.

Avec ce que nous avons appris dans cette matière, je me suis lancé dans un projet personnel de créer mon propre portfolio de A à Z (hormis le CSS que j'ai récupéré sur internet). Je me permets donc, en plus du TP n°1 & n°2, de le déposer.

## TP n°1 - Le site Web

Dans ce TP, j'ai implémenté tout ce qui a été demandé. J'ai par ailleurs ajouté des fonctionnalités qui n'étaient pas demandées et j'ai aussi créé des fonctions supplémentaires pour mieux structurer mon code.

Ce que j'ai ajouté :

- Le fait qu'un utilisateur puisse créer des posts (create_post.php avec add_post.php) qui devront être validés par un administrateur.
- Le fait qu'un administrateur puisse créer des posts (create_post_admin.php avec add_post_admin.php) qui n'ont pas besoin d'être validés par la suite.
- Le fait qu'un utilisateur puisse voir les posts des autres utilisateurs mais également ses posts qui sont en attente de vérification.
- L'onglet "News" qui permet de visualiser les posts les plus récents.
- L'onglet "Contact" qui simule un formulaire de contact (c'est juste visuel, celui-ci n'est pas fonctionnel).
- L'onglet "About".
- J'ai modifié un peu l'onglet de gestion des posts des administrateurs pour qu'ils puissent distinguer :
  - Les posts qui sont en attente de validation, et qu'ils puissent les valider / les supprimer.
  - Les posts qui ont été validés, et qu'ils puissent les supprimer.

## TP n°2 - Le jeu

J'ai implémenté ce qui était demandé concernant la sélection du mode de jeu. Cependant, je n'ai pas développé la partie "logique" pour le mode de jeu "drunk".

Le jeu s'utilise de la manière suivante :
1) Le joueur doit obligatoirement sélectionner un mode de jeu.
2) Une fois le mode de jeu sélectionné, il clique sur "JOUER".
3) Il valide la configuration du jeu en recliquant sur "JOUER".
4) Le jeu se lance.


## Projet personnel : Mon portfolio

J'ai récupéré le CSS sur internet, et je me suis inspiré de ce que nous avons fait en CM, TD et TP pour construire l'architecture de mon code et la BDD du site. Il n'est pas encore fini, mais l'objectif final est d'avoir un véritable portfolio, fonctionnel et accessible en ligne.

