<?php
session_start();

//Recuperer la photo de profil de l'utilisateur
$bdd = new PDO('mysql:host=127.0.0.1;dbname=my_dev_team;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$reponse = $bdd->query('SELECT * FROM membre WHERE id="' . $_GET['id'] . '"');
while ($donnees = $reponse->fetch()) {
    $nom = $donnees['nom'];
    $prenom = $donnees['prenom'];
    $competence = $donnees['competence'];
    $date_inscription = $donnees['date_inscription'];
    $photo_profil = $donnees['photo_profil'];
    $mail = $donnees['mail'];
    $id= $donnees['id'];
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre profil</title>

</head>

<body>
    <!-- Menu de la page -->
    <?php
    if (isset($_SESSION['id'])) {
        include('logged_menu.php');
    } else {
        include('menu.php');
    }
    ?>
   <div class="profil marge_menu">
        <div class="profil_image">
            <img id="profil_image" src="upload/<?php echo $photo_profil ?>">
            <h3 class="profil_nom"><?php echo $nom ?></h3><br>
            <h3 class="profil_prenom"><?php echo $prenom ?></h3>
        </div>
        <div class="profil_competence-p">
            <h2><?php echo $competence ?></h2>
        </div>
        <div class="profil_description">
            <p class="description_texte">Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis tempora repellendus exercitationem deleniti nihil culpa reiciendis ipsam eius, delectus accusamus cumque excepturi accusantium laboriosam aperiam dolores fugit laborum expedita libero!</p>
        </div>
        <div class="profil_informations">
            <h6>Addresse mail: <?php echo $mail ?></h6>
            <h6>Date d'inscription: <?php echo $date_inscription ?></h6>
        </div>
    </div>
    <h1>Consultez toutes les idées de projet de <?php echo $nom .' '. $prenom?></h1>
    <div class="liste_projet">
        <?php
        $bdd = new PDO('mysql:host=127.0.0.1;dbname=my_dev_team;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $reponse = $bdd->query('SELECT * FROM projet WHERE id_chef="' . $id . '" ORDER BY id DESC ');
        while ($donnees = $reponse->fetch()) {
            echo '<div class="projet_carte">';
            echo '<div class="projet_chef">';
            echo '<a href="profil.php?id=' . $donnees['id_chef'] . '"><img class="projet_profil_logo" src="upload/' . $donnees['photo_profil'] . '" alt=""></a>';
            echo '<div class="projet_noms">';
            echo '<h3>' . $donnees['nom'] . '</h3>';
            echo '<h3>' . $donnees['prenom'] . '</h3>';
            echo '</div>';
            echo '</div>';
            echo '<div class="projet_infos">';
            echo '<h2 class="projet_titre">' . $donnees['titre'] . '</h2>';
            echo '<p class="projet_description">' . $donnees['description'] . '</p>';
            echo '</div>';
            echo '<div class="projet_tip">Compétences recherchées</div>';
            echo '<div class="projet_competence">';
            if ($donnees['graphiste'] == 1) {
                echo '<img class="projet_competence_logo" src="image/graphiste.png" alt="">';
            }
            if ($donnees['dev_front'] == 1) {
                echo '<img class="projet_competence_logo" src="image/dev_front.png" alt="">';
            }
            if ($donnees['dev_mobile'] == 1) {
                echo '<img class="projet_competence_logo" src="image/dev_mobile.png" alt="">';
            }
            if ($donnees['dev_back'] == 1) {
                echo '<img class="projet_competence_logo" src="image/dev_back.png" alt="">';
            }
            if ($donnees['web_designer'] == 1) {
                echo '<img class="projet_competence_logo" src="image/web_designer.png" alt="">';
            }
            if ($donnees['social'] == 1) {
                echo '<img class="projet_competence_logo" src="image/social.png" alt="">';
            }
            if ($donnees['expert'] == 1) {
                echo '<img class="projet_competence_logo" src="image/cyber.png" alt="">';
            }
            echo '</div>';
            echo '</div>';
        }
        ?>
    </div>
    <?php
    include('footer.php');
    ?>
</body>

</html>