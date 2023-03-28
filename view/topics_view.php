<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<nav>
      <div class="logo">
        <p>Le Site du chat</p>
      </div>
      <ul>
      <li><a href="./index.php?action=accueil">Accueil</a></li>
      </ul>
    </nav>   
    <?php foreach ($_SESSION['topics'] as $topic): ?>
      <div class="topics">
        <h2 id="top"><?php echo $topic['titre'] ?></h2>
        <p id="bottom"><?php echo $topic['contenu'] ?></p>
      </div>
    <?php endforeach; ?>

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
