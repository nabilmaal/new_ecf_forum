

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css/style_profil.css">
    <title>Document</title>
</head>
<body>

<nav>
  <div class="logo">
    <img src=".\photo_accueil\pintview.png" alt="Logo de votre site">
  </div>
  <ul>
    <li><a href="./index.php?action=accueil">Accueil</a></li>
    <li><a href="./index.php?action=deconnexion">Deconnexion</a></li>
  </ul>

</nav>
    <form action="./index.php?action=update" method="POST">
    <div id="mod_upl"> 
          <div id="img">
           <img src="" alt="">
           </div>
        <div id="modification">
        <h1>modification</h1>
        <div id=""></div>
        <label for="name"></label>
        <input type="text" id="name" name="name" placeholder="Nom">
        
        <label for="newname"></label>
        <input type="text" id="newname" name="newname"placeholder="Nouveau Nom">
        
        <div id=""></div>
        <label for="email"></label>
        <input type="email" name="email" id="email" placeholder="email">
        
        <label for="newemail"></label>
        <input type="email" name="newemail" id="newemail" placeholder="nouvelle email">
    
        <div id=""></div>
        <label for="password"></label>
        <input type="password" id="password" name="password"placeholder="Mot de passe">
        
        <label for="newpass"></label>
        <input type="password" id="newpass" name="newpass"placeholder="Nouveau mot de passe">
        
        <label for="submit"></label>
        <input type="submit" id="submit" name="submit">
       </div>
     </form>
     <br>
  </div>
  
  <form action="./index.php?action=submit" method="POST">
    <label for="title">Titre :</label>
    <input type="text" name="titre" />

    <label for="contenu">Contenu :</label>
    <input type="text" name="contenu" />
    
    <input type="text"  hidden name="id_user" value="<?php echo $_SESSION['id_user']; ?>" />

    <input type="submit" name="submit" />
</form>

</body>
</html>


<style scoped>
  nav {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 1rem;
  background-color: #fff;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.logo img {
  height: 50px;
}

ul {
  display: flex;
  justify-content: flex-end;
  align-items: center;
  list-style: none;
  margin: 0;
  padding: 0;
}

li {
  margin: 0 1rem;
}

a {
  text-decoration: none;
  color: #333;
  font-weight: bold;
  font-size: 1rem;
  transition: color 0.2s ease-in-out;
}

a:hover {
  color: #666;
}
</style>

