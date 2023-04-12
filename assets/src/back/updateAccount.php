<?php
session_start();
require('function.php');

if (isset($_POST['updateAccount'])) {
    if (!empty($_POST['pseudo_users']) || !empty($_POST['name_users']) || !empty($_POST['surname_users']) || !empty($_POST['email_users'])) {
        if (filter_var($_POST['email_users'], FILTER_VALIDATE_EMAIL)) {
            $pseudo_users = htmlspecialchars(strip_tags($_POST['pseudo_users']));
            $name_users = htmlspecialchars(strip_tags($_POST['name_users']));
            $surname_users = htmlspecialchars(strip_tags($_POST['surname_users']));
            $email_users = htmlspecialchars(strip_tags($_POST['email_users']));
            $avatar_users = "";

            var_dump($_FILES);
            if (!empty($_FILES['avatar_users']['name'])) {

                $nameFile = $_FILES['avatar_users']['name'];
                $typeFile = $_FILES['avatar_users']['type'];
                $tmpFile = $_FILES['avatar_users']['tmp_name'];
                $errorFile = $_FILES['avatar_users']['error'];
                $sizeFile = $_FILES['avatar_users']['size'];

                $extensions = ['png', 'jpg', 'jpeg', 'gif', 'jfif'];
                $type = ['image/png', 'image/jpg', 'image/jpeg', 'image/gif', 'image/jfif'];

                $extension = explode('.', $nameFile);

                $max_size = 1000000;

                if (in_array($typeFile, $type)) {
                    if (count($extension) <= 2 && in_array(strtolower(end($extension)), $extensions)) {
                        if ($sizeFile <= $max_size && $errorFile == 0) {
                            if (move_uploaded_file($tmpFile, $avatar_users = '../../img/upload/avatar/' . uniqid() . '.' . end($extension))) {
                                echo "upload  effectué !";
                                $avatar_users = str_replace("../../","assets/",$avatar_users);
                            } else {
                                echo 'failImageUpload';
                            }
                        } else {
                            echo 'highImageWeight';
                        }
                    } else {
                        echo 'notImage';
                    }
                } else {
                    echo 'errorImageType';
                }
            } else {
                $avatar_users = $_POST['avatar_users'];
            }
            $user = [
                'id_users' => $_POST['id_users'],
                'pseudo_users' => $pseudo_users,
                'name_users' => $name_users,
                'surname_users' => $surname_users,
                'email_users' => $email_users,
                'avatar_users' => $avatar_users,
            ];
            updateUser($user);
            $_SESSION['account']['pseudo'] = $user['pseudo_users'];
            $_SESSION['account']['name'] = $user['name_users'];
            $_SESSION['account']['surname'] = $user['surname_users'];
            $_SESSION['account']['email'] = $user['email_users'];
            $_SESSION['account']['avatar'] = $user['avatar_users'];

            header('Location: ../../../account.php');
        } else {
            echo "L'email n'est pas valide.";
        }
    } else {
        echo "Les champs sont vides.";
    }
} else {
    echo "Le formulais n'a pas était reçu.";
}
var_dump($_POST);