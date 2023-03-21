<?php
session_start();
require_once('./access.php');

try {
    if ($_POST) {
        $nameInput = htmlspecialchars($_POST['name']);
        $surnameInput = htmlspecialchars($_POST['surname']);
        $pseudoInput = htmlspecialchars($_POST['pseudo']);
        $emailInput = htmlspecialchars($_POST['email']);
        $passwordInput = htmlspecialchars($_POST['password']);
        $RepeatPasswordInput = htmlspecialchars($_POST['repeatPassword']);


        if ($RepeatPasswordInput === $passwordInput) {
            $_SESSION['errorMessage'] = "passwordNotIdentical";
            header('location: ../../../login.php');
        }
        if (!filter_var($emailInput, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['errorMessage'] = "incorrectEmail";
            header('location: ../../../login.php');
        }
        if (
            !empty($nameInput) && !empty($surnameInput) &&
            !empty($emailInput) && !empty($passwordInput) && !empty($pseudoInput)
        ) {
            $req = "SELECT pseudo FROM users WHERE pseudo = :pseudo";
            $stmt = $bd->prepare($req);
            $stmt->execute(['pseudo' => $pseudoInput]);
            $pseudoOk = $stmt->fetch();
            var_dump($pseudoOk);

            if ($pseudoOk) {

                $req = "SELECT email FROM users WHERE email = :email";
                $stmt = $bd->prepare($req);
                $stmt->execute(['email' => $emailInput]);
                $emailOk = $stmt->fetch();
                var_dump($emailOk);

                if (empty($emailOk)) {
                    $passwordInput = password_hash($passwordInput, PASSWORD_DEFAULT);

                    $req = "INSERT INTO `users` (`name`,`surname`,`pseudo`,`email`,`password`,`id_role`) 
                    VALUES (:name, :surname, :pseudo, :email, :password, 2)";
                    $stmt = $bd->prepare($req);
                    $stmt->execute([
                        'name' => $nameInput,
                        'surname' => $surnameInput,
                        'pseudo' => $pseudoInput,
                        'email' => $emailInput,
                        'password' => $passwordInput
                    ]);
                    $_SESSION['successMessage'] = 'registration';
                } else {
                    $_SESSION['errorMessage'] = "useEmail";
                }
            } else {
                $_SESSION['errorMessage'] = "nicknameAlreadyUsed";
            }
        } else {
            $_SESSION['errorMessage'] = "emptyFields";
        }
        header('location: ../../../login.php');
    }
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
?>