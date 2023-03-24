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
    <form action="./index.php?action=connexion" method="POST">
      <div id="form_img"> 
        <div id="img">
          <img src="" alt="">
        </div>
        <div id="co_insc">
          <div id="connexion">
            <h1>Connexion </h1> 
            <label for="name"></label>
            <input type="text" id="name" name="name" placeholder="Nom">
            <br>
            <label for="password"></label>
            <input type="password" id="password" name="password" placeholder="Mot de passe">
            <br>
            <label for="submit"></label>
            <input type="submit" id="submit" name="Connexion" value=" Se connecter">
          </div>
          <div id="inscription">
            <p> Pas encore inscrit ?&nbsp;<a href="index.php?action=inscription">Inscrivez-vous !</a></p>
          </div>
        </div>
      </div>
    </form>
  </body>
</html>
