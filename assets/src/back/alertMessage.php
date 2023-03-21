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
    $errorMessage = alertBorder($errorTable[$_SESSION['errorMessage']], 'danger');
    unset($_SESSION['errorMessage']);
}

//Success
if (isset($_SESSION['successMessage'])) {
    $successMessage = alertBorder($successTable[$_SESSION['successMessage']], 'success');
    unset($_SESSION['successMessage']);
}


// Function
function alertBorder($errorMessage, $type)
{
    $divStart = "<div class='alert alert-" . $type . "' role='alert'>";
    $divEnd = "</div>";

    return $divStart . $errorMessage . $divEnd;
}

?>