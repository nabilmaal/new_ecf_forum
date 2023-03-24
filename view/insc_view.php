<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./view/style.css/style_co_insc.css">
        <title>Document</title>
    </head>
    <body>
        <form action="./index.php?action=inscription" method="POST">
            <div id="form_img"> 
                <div id="img">
                    <img src="" alt="">
                </div>
                <div id="co_insc">
                    <div id="connexion"> 
                        <h1>Inscription</h1>
                        <br>
                        <label for="email"></label>
                        <input type="email" name="email" id="email" placeholder="Email">
                        <br>
                        <label for="name"></label>
                        <input type="text" id="name" name="name" placeholder="Nom">
                        <br>
                        <label for="password"></label>
                        <input type="password" id="password" name="password" placeholder="Mot de passe">
                        <?php $errorpwd = '<p style="color: red;">Le mot de passe doit contenir au moins 8 caractères, une minuscule, une majuscule et un chiffre et l\'adresse email est incorrecte </p>'; ?>
                        <br>
                        <label for="submit"></label>
                        <input type="submit" id="submit" name="submit" value="S'inscrire !">
                    </div>
                    <div id="inscription">
                        <p> Déjà inscrit ?&nbsp;<a href="index.php?action=connexion">Connectez-vous !</a></p>
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>

        