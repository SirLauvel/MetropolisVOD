<?php
// Init
$errorMessage = "";
$successMessage = "";

//Data message
$errorTable = [
    'passwordNotIdentical' => "Les mots de passe ne sont pas identiques.",
    'nicknameAlreadyUsed' => "Le pseudo est déjà utilisée.",
    'email' => "L'email est incorrect.",
    'connexion' => "La connexion est incorrect.",
    'useEmail' => "L'email est déjà utilisé.",
    'inncorectEmail' => "Veuillez rentrer une email valide.",
    'emptyFields' => "Veuillez remplir toutes les champs."
];
$successTable = [
    'registration' => "L'inscription à était réussie, vous pouvez maintenant vous connecter.",
    'product' => "Le produit a été enregistrer dans la base de données !"
];

//Error


if (isset($_SESSION['errorMessage'])) {
    $errorMessage = alertBorder($errorTable[$_SESSION['errorMessage']], 'error');
    unset($_SESSION['errorMessage']);
}

//Success
if (isset($_SESSION['successMessage'])) {
    $successMessage = alertBorder($successTable[$_SESSION['successMessage']], 'success');
    unset($_SESSION['successMessage']);
}


// Function
function alertBorder($message, $type)
{
    $divStart='<div>';
    $divErrorStart = '<div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-100"
    role="alert">';
    $divSuccessStart = '<div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-100"
    role="alert">';
    $divEnd = "</div>";

    if ($type == 'error') {
        $divStart = $divErrorStart;
    } elseif ($type == 'success') {
        $divStart = $divSuccessStart;
    }
    $messageAlert = $divStart . $message . $divEnd;
    return $messageAlert;
}

?>