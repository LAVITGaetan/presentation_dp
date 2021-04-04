    <!-- Vérification des entrées utilisateurs et de la table membre-->
    <?php

    if (isset($_POST['connecter']) & !empty($_POST['email']) & !empty($_POST['mot_de_passe'])) {
        //Récuperation de l'utilisateur via son pseudo
        $bdd = new PDO('mysql:host=127.0.0.1;dbname=my_dev_team;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $reponse = $bdd->query('SELECT * FROM membre WHERE mail ="' . $_POST['email'] . '"');
        while ($donnees = $reponse->fetch()) {
            $nom = $donnees['nom'];
            $prenom = $donnees['prenom'];
            $mot_de_passe = $donnees['mot_de_passe'];
            $mail = $donnees['mail'];
            $date_inscription = $donnees['date_inscription'];
            $id = $donnees['id'];
            $photo_profil = $donnees['photo_profil'];
            $competence = $donnees['competence'];
        }

        //Vérification du mot de passe
        //Si le mot de passe ne correspond pas afficher un message d'erreur
        $mot_de_passe_identique = password_verify($_POST['mot_de_passe'], $mot_de_passe);
        if (!$mot_de_passe_identique) {
            echo '<span class="alerte_message">Vos identifiants ne correspondent pas!</span>';
        } else {

            //Si le mot de passe correspond, crée une session et récupérer les données de l'utilisateur 
            //puis le rediriger vers la page d'espace membre
            if ($mot_de_passe_identique) {
                session_start();
                $_SESSION['id'] = $id;
                $_SESSION['nom'] = $nom;
                $_SESSION['prenom'] = $prenom;
                $_SESSION['date_inscription'] = $date_inscription;
                $_SESSION['mail'] = $mail;
                $_SESSION['photo_profil'] = $photo_profil;
                $_SESSION['competence'] = $competence;
                echo 'vous etes connecté';
                header('location:accueil.php');
            } else {
                echo 'Mauvais identifiants ou mot de passe';
            }
        }
    }?>