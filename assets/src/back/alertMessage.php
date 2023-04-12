<?php
/*
class AlertMessage {

// Properties

private $errorTable = [
    'passwordNotIdentical' => "Les mots de passe ne sont pas identiques.",
    'nicknameAlreadyUsed' => "Le pseudo est déjà utilisée.",
    'connexion' => "L'identifiant ou le mot de passe saisie est incorrect.",
    'useEmail' => "L'email est déjà utilisé.",
    'inncorectEmail' => "Veuillez rentrer une email valide.",
    'emptyFields' => "Veuillez remplir toutes les champs."
];

private $successTable = [
    'registration' => "L'inscription à était réussie, vous pouvez maintenant vous connecter.",
    'product' => "Le produit a été enregistrer dans la base de données !"
];

// Methods


}
*/

// Init
$messageAlert = "";

//Data message
$errorTable = [
    'errorForm' => "Le formulaire n'a pas été reçu.",
    'passwordNotIdentical' => "Les mots de passe ne sont pas identiques.",
    'nicknameAlreadyUsed' => "Le pseudo est déjà utilisée.",
    'connexion' => "L'identifiant ou le mot de passe saisie est incorrect.",
    'useEmail' => "L'email est déjà utilisé.",
    'inncorectEmail' => "Veuillez rentrer une email valide.",
    'emptyFields' => "Veuillez remplir toutes les champs.",
    'failImageUpload' => "Echec de l'upload de l'image !",
    'highImageWeight' => "Erreur le poids de l'image est trop élevé !",
    'notImage' => "Merci d'upload une image !",
    'errorImageType' => "Type non autorisé !(poster)",
    'failVideoUpload' => "Echec de l'upload de la vidéo !",
    'highVideoWeight' => "Erreur le poids de la vidéo est trop élevé !",
    'notVideo' => "Merci d'upload une vidéo !",
    'errorVideoType' => "Type de non autorisé !(vidéo)",
    'numberCategory' => 'Vous devez choisir un nombre de catégorie situer entre 1 et 3.',
    'failCategory' => "Erreur lors de la mise en bdd des catégories.",
    'existRealisator' => 'Le réalisateur est déjà existant.',
];
$successTable = [
    'registration' => "L'inscription à était réussie, vous pouvez maintenant vous connecter.",
    'product' => "Le produit a été enregistrer dans la base de données !",
    'addFilm' => "Le film à bien était ajouter.",
    'addRealisator' => "Le réalisateur à bien était ajouté.",
    'updateMovie' => "Le film à bien était modifié.",
];

//Error


if (isset($_SESSION['errorMessage'])) {
    $messageAlert = alertBorder($errorTable[$_SESSION['errorMessage']], 'error');
    unset($_SESSION['errorMessage']);
}

//Success
if (isset($_SESSION['successMessage'])) {
    $messageAlert = alertBorder($successTable[$_SESSION['successMessage']], 'success');
    unset($_SESSION['successMessage']);
}


// Function
function alertBorder($message, $type)
{
    $messageAlert = "";
    $divErrorStart = '<div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-100"
    role="alert">';
    $divSuccessStart = '<div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-100"
    role="alert">';

    if ($type == 'error') {
        $messageAlert = $divErrorStart . $message . "</div>";
    } elseif ($type == 'success') {
        $messageAlert = $divSuccessStart . $message . "</div>";
    }
    return $messageAlert;
}

?>