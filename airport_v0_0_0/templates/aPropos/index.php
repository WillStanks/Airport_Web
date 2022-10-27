<!DOCTYPE html>
<html>
<h1>William Stancu</h1>
<h2>420-5H6 MO Applications Web Transactionnelles</h2>
<h2>Automne 2022, Collège Montmorency</h2>

<h3>Description somaire de l'application</h3>
<p>Tout d'abord cette application à pour but de pouvoir faire des réservations de voyages.
    La première fonctionnalité est de pouvoir se créer un compte et de pouvoir se connecter via le bouton dans le menu de haut.
    Ensuite, il est possible de créer de nouvelle réservation avec l'option de choisir le titre du voyage, la ville de départ,
    la ville de destination, la description du voyage, une image du drapeau du pays voyagé, et le choix de l'avion dans lequel vous
    allez monter à bord. Il est ensuite possible de pouvoir afficher, modifier et supprimer cette réservations. Évidemment, la page principal
    vous permet de voir tous les réservations déjà créée. Ensuite, l'application est disponible en 3 langues (Français, Anglais, Roumain).
</p><br>
<h3>Nouvelles fonctionnalités !</h3>
<p>
    Il est maintenant possible d'ajouter des nouveaux pays, provinces ou États et des villes pour diversifier nos réservations de voyages.
    Lorsque vous ajouter des états ou provinces et des villes vous devez toujours les liés avec leur pays ainsi que provinces ou états.
    L'interface pour les pays est maintenant faite en monopage qui communique maintenant avec un API. Ensuite, la page des avions est maintenant
    accesible via un login Admin pour pouvoir ajouter, modifier et supprimer un avion. Elle est aussi adapter au plus petit écran (Exemple : Téléphone intelligent).
    Elle utilise notamment Bootstrap UI. Finalement, lors du choix de villes de départ ainsi que d'arrivé de la réservation, vous serez obliger de sélectionner
    une ville parmis celle de la BD. Pour vous aider une autocomplétion à été ajouté pour ses champs.
</p><br>
<h3>Quelques erreurs possibles</h3>
<p>
    Si jamais vous essayez de modifier ou supprimer une réservation que vous n'avez pas créers vous allez recevoir une erreur car
    la modification et l'effacement est réservé à l'utilisateur qui l'a créée.
</p>

<h3>Diagramme de la base de donnée</h3>
<img src="webroot/img/diagrammeBD.png">

</html>