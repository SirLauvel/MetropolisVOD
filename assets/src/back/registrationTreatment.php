<?php
session_start();
require('function.php');


function checkPost(){
    if ($_POST['password'] != $_POST['repeatPassword']) {
        $_SESSION['errorMessage'] = "passwordNotIdentical";
        var_dump($_POST['repeatPassword']);
        var_dump($_POST['password']);
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $_SESSION['errorMessage'] = "incorrectEmail";
        var_dump($_POST['email']);
    } elseif (empty($_POST['name']) || empty($_POST['surname']) || empty($_POST['email']) || empty($_POST['pseudo']) || empty($_POST['password']) || empty($_POST['repeatPassword'])) {
        $_SESSION['errorMessage'] = "emptyFields";
    } elseif (checkPseudo($_POST['pseudo'])) {
        $_SESSION['errorMessage'] = "nicknameAlreadyUsed";
    } elseif (checkEmail($_POST['email'])) {
        $_SESSION['errorMessage'] = "useEmail";
    } else {
        return $users = [
            'name' => htmlspecialchars(strip_tags($_POST['name'])),
            'surname' => htmlspecialchars(strip_tags($_POST['surname'])),
            'pseudo' => htmlspecialchars(strip_tags($_POST['pseudo'])),
            'email' => htmlspecialchars(strip_tags($_POST['email'])),
            'avatar' => 'assets/img/avatar/user.png',
            'password' => htmlspecialchars(strip_tags($_POST['password'])),
            'repeatPassword' => htmlspecialchars($_POST['repeatPassword']),
        ];
    }
    return false;
}


try {
    if ($_POST) {
        
        $user = checkPost();

        if (!empty($user)) {
            $hashPassword = password_hash($user['password'], PASSWORD_DEFAULT);
            $user['password'] = $hashPassword;
            addUser($user);
            $_SESSION['successMessage'] = 'registration';
        }
        var_dump($user);
        //var_dump($_SESSION['errorMessage']);
        header('location: ../../../login.php');
    }

} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
?>