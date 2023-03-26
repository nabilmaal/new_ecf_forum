<?php 
session_start();

require "controllers/controller.php";

try {
   if (empty($_GET['action'])) { 
   require('view/accueil_view.php');
}

else if (isset($_GET['action']) && $_GET['action'] =='connexion') {
    connexion(); 
}

else if (isset($_GET['action']) && $_GET['action'] =='deconnexion') {
    deconnexion(); 
}

else if (isset($_GET['action']) && $_GET['action'] =='profil') {
    profil(); 
}

else if (isset($_GET['action']) && $_GET['action'] =='accueil') {
   accueil(); 
   
}

else if (isset($_GET['action']) && $_GET['action'] == 'inscription') {
    subscrib();
}

else if (isset($_GET['action']) && $_GET['action'] == 'update') {
    updateItems(); 
}


else if (isset($_GET['action']) && $_GET['action'] == 'submit') {
    Posts(); 
    
}

else if (isset($_GET['action']) && $_GET['action'] == 'redi') {
    redi(); 
    
}

else {
    echo 'Mauvaise action';
} 

}
catch(Exception $e) { 
   echo $e-> getMessage();
}

?>
