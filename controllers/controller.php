<?php 
require './models/model.php';

function subscrib() {
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        if (empty($_POST['name']) || empty($_POST['password']) || empty($_POST['email']) || !empty(select())) {
            echo'<p style="color: red;">remplissez tout les champs ou l\'utilisateur existe déjà</p>'; 
        } else {
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $regex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/';
            $email = $_POST['email'];
            $regex1 = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
            if (!preg_match($regex1, $email) || !preg_match($regex, $_POST['password'])) {
                echo "Une erreur lors de votre inscription est survenue ! recommencez. ";
            }
            
            $sub = subscriber($_POST['name'], $_POST['email'], $password);
            echo 'Félicitation vous pouvez deseormez vous connectez';
        } 
    }
    require('view/insc_view.php');
}


function connexion() {
    select(); 
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $user = select();
        if (empty($_POST['name']) || empty($_POST['password'])) {
            echo '<p style="color: red;">Vous n\'avez pas renseigné vos informations de connexion.</p>';
        }  
        else if (isset($user[0]) && password_verify($_POST['password'], $user[0]['password'])) {
            $_SESSION['id_user'] = $user[0]['id_user'];
            header('Location: index.php?action=profil');
        }
        else {
            echo '<p style="color: red;">verifiez vos informations de connexion.</p>';
        }     
    } 
    require('view/co_view.php');
}


function profil() {
    require('view/profil_view.php');  
}

function accueil() {
    select_titre();
    require('view/accueil_view.php');
}

function redi() {
    require('view/sujet_view.php');  
}

function updateItems() {
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        update();

        if (empty($_POST['name']) || empty($_POST['newname']) || empty($_POST['email']) || empty($_POST['newemail']) || empty($_POST['password']) || empty($_POST['newpass'])) {
            echo '<p style="color: red;">Vous n\'avez pas renseigné vos informations de Modification.</p>';
        }
    }
    require('view/profil_view.php');
}

function Posts() {
    if ($_SERVER['REQUEST_METHOD'] === "POST") {

        $contenu = $_POST['contenu'];
        $titre = $_POST['titre'];
        $id_user = $_POST['id_user'];

        $_SESSION['titre'] = $titre;

        if (empty($_POST['contenu']) || empty($_POST['titre']) || empty($_POST['id_user'])) {
            echo '<p style="color: red;">Veuillez inscrire un message !</p>';
        } else if (post($_POST['titre'], $_POST['contenu'], $_POST['id_user']));
    } 
    require('view/profil_view.php');
}

function select_titre() {
    $content = SelectTopics();
    $topics = array();

    foreach ($content as $row) {
        $topics[] = array(
            'titre' => $row['titre'],
            'contenu' => $row['contenu'],
        );
    }

    $_SESSION['topics'] = $topics;
}

       
function AddComment() {
    $content = getCommentIds();
    $topics = array();

    foreach ($content as $row) {
        $topics[] = array(
            'id_topic' => $row['id_topic'],
            'id_user' => $row['id_user'],
        );
    }

    $_SESSION['topic'] = $topics;   
}

if (isset($_POST['commentaire']) && !empty($_POST['commentaire']) && isset($_POST['id_topic']) && !empty($_POST['id_topic'])) {
    $id_user = $_SESSION['user']['id_user'];
    $commentaire = $_POST['commentaire'];
    $id_topic = $_POST['id_topic'];
        
    comments($id_user, $commentaire, $id_topic);
        
    header('Location: ./index.php?action=accueil'.$id_topic);
    exit();
}

function deconnexion() {
    session_destroy(); 
    
    header('Location: ./index.php?action=accueil');
    require('view/profil_view.php');
}



