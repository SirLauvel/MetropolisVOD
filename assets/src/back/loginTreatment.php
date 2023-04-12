<?php
session_start();
require('function.php');
try {

    $pseudoInput = htmlspecialchars($_POST['pseudo']);
    $passwordInput = htmlspecialchars($_POST['password']);

    var_dump($pseudoInput);
    var_dump($passwordInput);

    if (!empty($pseudoInput) && !empty($passwordInput)) {
        $account = getUser($pseudoInput);

        var_dump($account);
        if ($account) {
            if (password_verify($passwordInput, $account['password_users'])) {
                $_SESSION['account'] = [
                    'id_users' => $account['id_users'],
                    'name' => $account['name_users'],
                    'surname' => $account['surname_users'],
                    'pseudo' => $account['pseudo_users'],
                    'email' => $account['email_users'],
                    'avatar' => $account['avatar_users'],
                    'id_role' => $account['id_role']
                ];
                header('location: ../../../index.php');
            } else {
                $_SESSION['errorMessage'] = 'connexion';
                var_dump($_SESSION['errorMessage']);
                header('location: ../../../login.php');
            }
        } else {
            $_SESSION['errorMessage'] = 'connexion';
            var_dump($_SESSION['errorMessage']);
            header('location: ../../../login.php');
        }
    } else {
        $_SESSION['errorMessage'] = 'emptyFields';
        var_dump($_SESSION['errorMessage']);
        header('location: ../../../login.php');
    }

} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
?>