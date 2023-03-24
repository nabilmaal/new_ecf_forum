<?php
define('BD_HOST', 'localhost');
define('BD_PORT', '3306');
define('BD_DATABASE', 'ecf-forum');
define('BD_USERNAME', 'root');
define('BD_PASSWORD', '');

function dbConnect() {
    $database = new PDO ('mysql:host='.BD_HOST.';port='.BD_PORT.';dbname='.BD_DATABASE, BD_USERNAME, BD_PASSWORD);
    return $database; 
}

function subscriber($email, $password) {
    $db = dbConnect();
    $sql = $db->prepare('INSERT INTO users (name, email, password) VALUES (?,?,?)');
    $sql->execute(array($_POST['name'], $email, $password));
    return $sql;
}

function select() {
    $db = dbConnect();

    $name = $_POST['name'] ?? "";

    $sql = $db->prepare('SELECT * FROM users WHERE name = :name');
    $sql->execute(array(':name' => $name));
    $result = $sql->fetchAll(PDO::FETCH_ASSOC); 

    return $result;  
}

function update() {
    $db = dbConnect();

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (isset($name, $email, $password)) {
        $sql = $db->prepare('SELECT password, email FROM users WHERE name = :name AND email = :email');
        $sql->execute(array(':name' => $name, ':email' => $email));
        $result = $sql->fetch(PDO::FETCH_ASSOC);
        $hashed_password = $result['password'];

        if (password_verify($password, $hashed_password)) {
            $newname = $_POST['newname'];
            $newemail = $_POST['newemail'];
            $newpass = password_hash($_POST['newpass'], PASSWORD_DEFAULT);

            $sql = $db->prepare('UPDATE users SET name = :newname, email = :newemail, password = :newpass WHERE name = :name AND email = :email');
            $sql->execute(array(':newname' => $newname, ':newemail' => $newemail, ':newpass' => $newpass, ':name' => $name, ':email' => $email));
        }
    }
}

function post($titre, $contenu, $id_user) {
    $db = dbConnect();

    $stmt = $db->prepare("INSERT INTO topics (titre, contenu, id_user) VALUES (:titre, :contenu, :id_user)");
    $stmt->bindParam(':titre', $titre);
    $stmt->bindParam(':contenu', $contenu);
    $stmt->bindParam(':id_user', $id_user);
    $stmt->execute();
}


function SelectTopics(){
    $db = dbConnect();

    $sql = $db->prepare('SELECT * FROM topics');
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC); 
    return $result;  
}


function comments ($id_user, $commentaire, $id_topic) {
    $db = dbConnect();
    $stmt = $db->prepare('INSERT INTO comments (content, id_user, id_topic) VALUES (:content, :id_user, :id_topic)');
    $stmt->execute(array(':content' => $commentaire, ':id_user' => $id_user, ':id_topic' => $id_topic));

}

function getCommentIds() {
    $db = dbConnect();
    $stmt = $db->prepare('SELECT id_topic, id_user FROM comments');
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
