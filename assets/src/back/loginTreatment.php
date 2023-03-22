<?php
session_start();

try {
    $bd = new PDO(
        'mysql:host=localhost;dbname=metropolisVOD;charset=utf8',
        'root',
        '',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
    );


    $pseudoInput = htmlspecialchars($_POST['pseudo']);
    $passwordInput = htmlspecialchars($_POST['password']);

    var_dump($pseudoInput);
    var_dump($passwordInput);

    if (!empty($pseudoInput) && !empty($passwordInput)) {
        $req = "SELECT * FROM users WHERE pseudo_users = :pseudo_users";
        $stmt = $bd->prepare($req);
        $stmt->execute(['pseudo_users' => $pseudoInput]);
        $account = $stmt->fetch();

        var_dump($account);
        if ($account) {
            if (password_verify($passwordInput, $account['password_users'])) {
                $_SESSION['account'] = [
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