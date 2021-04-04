<?php
session_start();
if (isset($_POST['supprimer'])) {
    //Récuperation de l'utilisateur via son pseudo
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=my_dev_team;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $reponse = $bdd->query('SELECT * FROM projet');
    $requete = 'DELETE FROM projet WHERE id ="' . $_POST['id_projet'] . '"';
    $resultat = $bdd->query($requete);
    header('location:espace_membre.php#encre_projet');
}
?>