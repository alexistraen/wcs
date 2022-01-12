<?php

require "Models/Database.php";
require "Models/Argonautes.php";

$argonautes = new Argonautes();

$getAllMembers = $argonautes->getAllMembers();

if (isset($_POST["addMember"])) {
    $arrayErrors = [];

    function cleanData($argoName)
    {
        $argoName = trim($argoName);
        $argoName = stripslashes($argoName);
        $argoName = htmlspecialchars($argoName);
        return $argoName;
    }

    if (!empty($getAllMembers)) {
        if (count($getAllMembers) >= 50) {
            $arrayErrors["name"] = "L'équipage est déjà au complet !";
        }
    }

    if (isset($_POST["name"])) {
        $regexName = "/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð'-]{2,25}+$/";
        $securedName = cleanData($_POST["name"]);

        if (empty($_POST["name"])) {
            $arrayErrors["name"] = "Le champs ne doit pas être vide !";
        } else if (!preg_match($regexName, $securedName)) {
            $arrayErrors["name"] = "Le format du nom n'est pas correct !";
        }
    }

    if (empty($arrayErrors)) {

        if ($argonautes->addMember($securedName)) {
            header("Location: index.php");
        } else {
            $errorMessage = "Il y a eu une erreur lors de l'ajout de l'argonaute";
        }
    }
}