<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css/style.css">
    <title>Document</title>
  </head>
  <body>
    <nav>
      <div class="logo">
        <p>Le Site du chat</p>
      </div>
      <ul>
        <li><a href="./index.php?action=connexion" class="connexion">Connexion</a></li>
        <li><a href="./index.php?action=inscription" class="inscription">Inscription</a></li>
        <li><a href="./index.php?action=topics" class="topic">Topics</a></li>
      </ul>
    </nav>
    <?php foreach ($_SESSION['topics'] as $topic): ?>
      <div class="topics">
        <a href="./index.php?action=topics" id="top"><?php echo $topic['titre'] ?></a>
      
      </div>
    <?php endforeach; ?>
    <?php foreach ($_SESSION['comments'] as $comment): ?>
      <div class="comment">
        <p>ID modèle : <?php echo $comment['id_model']; ?></p>
        <p>ID utilisateur : <?php echo $comment['id_user']; ?></p>
        <p>Commentaire : <?php echo $comment['content']; ?></p>
      </div>
    <?php endforeach; ?>
    <form method="post" action="./index.php?action=addComment">
      <input type="hidden" name="id_topic" value="<?php echo $_GET['id_topic'] ?>">
      <textarea name="commentaire" placeholder="Entrez votre commentaire ici"></textarea>
      <input type="submit" value="Commenter">
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

  .topics {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 150px;
    width: 70%;
    border: 2px solid black;
    margin-top: 50px;
    margin-left: 100px;
    display:block;
    flex-direction: row;
    text-align: center;
  }

  #top {
    font-size: 25px;
  }
</style>
