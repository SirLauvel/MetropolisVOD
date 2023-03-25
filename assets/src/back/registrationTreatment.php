<?php
session_start();
require('access.php');


function checkPost($bd, $post){
    if ($post['password'] != $post['repeatPassword']) {
        $_SESSION['errorMessage'] = "passwordNotIdentical";
        var_dump($post['repeatPassword']);
        var_dump($post['password']);
    } elseif (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
        $_SESSION['errorMessage'] = "incorrectEmail";
        var_dump($post['email']);
    } elseif (empty($post['name']) || empty($post['surname']) || empty($post['email']) || empty($post['pseudo']) || empty($post['password']) || empty($post['repeatPassword'])) {
        $_SESSION['errorMessage'] = "emptyFields";
    } elseif (checkPseudo($bd, $post['pseudo'])) {
        $_SESSION['errorMessage'] = "nicknameAlreadyUsed";
    } elseif (checkEmail($post['email'])) {
        $_SESSION['errorMessage'] = "useEmail";
    } else {
        return true;
    }
    return false;
}
;
function checkPseudo($bd, $pseudo){
    $req = "SELECT pseudo_users FROM users WHERE pseudo_users = :pseudo";
    $stmt = $bd->prepare($req);
    $stmt->execute(['pseudo' => $pseudo]);
    $pseudoOk = $stmt->fetch();
    var_dump($pseudoOk);
    return $pseudoOk;
}
;
function checkEmail($email){
    $bd = new PDO(
        'mysql:host=localhost;dbname=metropolisVOD;charset=utf8',
        'root',
        '',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
    );
    $req = "SELECT email_users FROM users WHERE email_users = :email";
    $stmt = $bd->prepare($req);
    $stmt->execute(['email' => $email]);
    $emailOk = $stmt->fetch();
    var_dump($emailOk);
    return $emailOk;
}
;

try {
    if ($_POST) {
        $post = [
            'name' => htmlspecialchars($_POST['name']),
            'surname' => htmlspecialchars($_POST['surname']),
            'pseudo' => htmlspecialchars($_POST['pseudo']),
            'email' => htmlspecialchars($_POST['email']),
            'password' => htmlspecialchars($_POST['password']),
            'repeatPassword' => htmlspecialchars($_POST['repeatPassword']),
        ];
        $postOk = checkPost($bd, $post);

        if ($postOk) {
            $hashPassword = password_hash($post['password'], PASSWORD_DEFAULT);

            $req = "INSERT INTO `users` (`pseudo_users`,`email_users`,`password_users`,`name_users`,`surname_users`,`avatar_users`, `id_role`) 
                    VALUES (:pseudo_users, :email_users, :password_users, :name_users, :surname_users, :avatar_users, :id_role)";
            $stmt = $bd->prepare($req);
            $stmt->execute([
                'pseudo_users' => $post['pseudo'],
                'email_users' => $post['email'],
                'password_users' => $hashPassword,
                'name_users' => $post['name'],
                'surname_users' => $post['surname'],
                'avatar_users' => 'assets/img/avatar/user.png',
                'id_role' => 2
            ]);
            $_SESSION['successMessage'] = 'registration';
        }
        var_dump($_SESSION['errorMessage']);
        header('location: ../../../login.php');
    }

} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
?>