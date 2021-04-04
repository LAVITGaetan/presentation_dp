<?php
session_start();

// Si l'utilisateur veut ajouter un fichier 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    // Vérifier que le fichier ne contienne pas d'erreurs et récuperer le nom, la taille et le type de l'image
    if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_SESSION['id'] .'_' . $_FILES["photo"]["name"];
        $filetype = $_FILES["photo"]["type"];
        $filesize = $_FILES["photo"]["size"];
    
        // Vérifier l'extension du fichier
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
    
        // Vérifier que le fichier ne dépasse pas 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
    
        // Vérifier l'identifiant de format de données -> MIME
        if(in_array($filetype, $allowed)){

            // Connexion à la BDD
            $bdd = new PDO('mysql:host=127.0.0.1;dbname=my_dev_team;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            $reponse = $bdd->query('SELECT * FROM membre');

            // Si le fichier existe déjà
            if(file_exists("upload/" . $filename)){
                $requete = 'UPDATE membre SET photo_profil="' . $filename . '" WHERE id="' . $_SESSION['id'] .'"';
                $resultat = $bdd->query($requete);
                session_start();
                $_SESSION['photo_profil'] = $filename;
                header('location:espace_membre.php');
            }

            // Si le fichier n'existe pas 
            else{
                move_uploaded_file($_FILES["photo"]["tmp_name"], "upload/" . $filename);           
                $requete = 'UPDATE membre SET photo_profil="' . $filename . '" WHERE id="' . $_SESSION['id'] .'"';
                $resultat = $bdd->query($requete);
                $bdd = new PDO('mysql:host=127.0.0.1;dbname=my_dev_team;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                $reponse = $bdd->query('SELECT * FROM projet');
                $requete = 'UPDATE projet SET photo_profil="' . $filename . '" WHERE id_chef="' . $_SESSION['id'] .'"';
                $resultat = $bdd->query($requete);
                session_start();
                $_SESSION['photo_profil'] = $filename;
                header('location:espace_membre.php');
            }
        } else{
            echo "Une erreur est survenue, réessayez."; 
        }
    } else{
        echo "Erreur Réessayez";
    }
}
?>