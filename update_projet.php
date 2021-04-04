<?php
session_start();
if(isset($_POST['modifier'])){
    //Récupération des checkbox
    if(isset($_POST['graphiste'])){
        $graphiste = 1;
    }
    else{
        $graphiste = 0;
    }
    if(isset($_POST['dev_front'])){
        $dev_front = 1;
    }
    else{
        $dev_front = 0;
    }
    if(isset($_POST['dev_mobile'])){
        $dev_mobile = 1;
    }
    else{
        $dev_mobile = 0;
    }
    if(isset($_POST['dev_back'])){
        $dev_back = 1;
    }
    else{
        $dev_back = 0;
    }
    if(isset($_POST['web_designer'])){
        $web_designer = 1;
    }
    else{
        $web_designer = 0;
    }
    if(isset($_POST['social'])){
        $social = 1;
    }
    else{
        $social = 0;
    }
    if(isset($_POST['expert'])){
        $expert = 1;
    }
    else{
        $expert = 0;
    }
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=my_dev_team;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $reponse = $bdd->query('SELECT * FROM projet');
    $requete = 'UPDATE projet SET titre="' . $_POST['titre'] . '", description="' . $_POST['description'] . '", graphiste="' . $graphiste . '", dev_front="' . $dev_front . '", dev_mobile="' . $dev_mobile . '", dev_back="' . $dev_back . '", web_designer="' . $web_designer . '", social="' . $social . '", expert="' . $expert . '" WHERE id="' . $_POST['id_projet'] .'"';
    $resultat = $bdd->query($requete);
    header('location:espace_membre.php');
}


?>