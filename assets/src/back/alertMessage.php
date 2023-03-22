<?php
// Init
$messageAlert = "";

//Data message
$errorTable = [
    'passwordNotIdentical' => "Les mots de passe ne sont pas identiques.",
    'nicknameAlreadyUsed' => "Le pseudo est déjà utilisée.",
    'connexion' => "L'identifiant ou le mot de passe saisie est incorrect.",
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