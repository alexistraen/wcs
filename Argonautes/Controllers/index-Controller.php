<?php

require "Models/Database.php";
require "Models/Argonautes.php";

$argonautes = new Argonautes();

$getAllMembers = $argonautes->getAllMembers();

if (isset($_POST["addMember"])) {
    $arrayErrors = [];

    if (isset($_POST["name"])) {
        $regexName = "/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð\'-]{2,25}+$/";
        $name = htmlspecialchars($_POST["name"]);

        if (empty($_POST["name"])) {
            $arrayErrors["name"] = "Le champs ne doit pas être vide !";
        } else if (!preg_match($regexName, $name)) {
            $arrayErrors["name"] = "Le format du nom n'est pas correct !";
        } else {
            $securedName = htmlspecialchars($_POST["name"]);
        }
    }

    if (empty($arrayErrors)) {

        if ($argonautes->addMember($securedName)) {
            header("Location: index.php");
            $message = "L'argonaute a bien été ajouté";
        } else {
            $message = "Il y a eu une erreur lors de l'ajout de l'argonaute";
        }
    }
}