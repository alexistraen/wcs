<?php

require "Controllers/index-Controller.php";

?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="assets/css/style.css" rel="stylesheet">
  <title>Gestion de l'équipage</title>
</head>

<body>

  <!-- Header section -->
  <header>
    <h1>
      <img src="https://www.wildcodeschool.com/assets/logo_main-e4f3f744c8e717f1b7df3858dce55a86c63d4766d5d9a7f454250145f097c2fe.png" alt="Wild Code School logo" />
      Les Argonautes
    </h1>
  </header>

  <!-- Main section -->
  <main>

    <!-- New member form -->
    <h2>Ajouter un(e) Argonaute</h2>

    <form class="new-member-form" action="index.php" method="post">

      <div>
        <label for="name">Nom de l&apos;Argonaute</label>
        <input id="name" name="name" type="text" value="<?= isset($securedName) ? $securedName : "" ?>" placeholder="Charalampos">
      </div>

      <div class="formErrorMessage">
        <?= isset($arrayErrors['name']) ? $arrayErrors["name"] : "" ?>
      </div>

      <button type="submit" name="addMember">Envoyer</button>

      <div class="formErrorMessage">
        <?= isset($errorMessage) ? $errorMessage : "" ?>
      </div>

    </form>

    <!-- Member list -->
    <h2>Membres de l'équipage</h2>
    <h3><?= $getAllMembers ? count($getAllMembers) . "/50" : "" ?></h3>
    <div class="member-list">

      <?php

      if (!empty($getAllMembers)) {
        foreach ($getAllMembers as $key => $value) {

      ?>

          <div class="memberName">
            <p><?= $value["membersName"] ?></p>
          </div>

        <?php

        }
      } else {
        ?>

        <p>Il n'y a aucun membre dans l'équipage !</p>

      <?php
      }

      ?>

    </div>
  </main>

  <footer>
    <p>Réalisé par Jason en Anthestérion de l'an 515 avant JC</p>
  </footer>

</body>

</html>