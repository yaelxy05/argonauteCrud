<?php
// header
require "header.php";?>
<!-- Main section -->
  <main>
    <?php require "database.php";?>

    <!-- New member form -->
    <h2>Ajouter un(e) Argonaute</h2>
    <form class="new-member-form" method="POST" action="" name="formArg">
      <label for="name">Nom de l&apos;Argonaute</label>
      <input id="name" name="nameArg" type="text" placeholder="Nom"  value ="" required/>
      <button type="submit" name="insert">Envoyer</button>
    </form>

    <?php
if (isset($_POST['nameArg'])) {
    // Récupérer les valeurs
    $nameArg = $_POST['nameArg'];
    // Requête mysql pour insérer des données
    $sql = "INSERT INTO `argonautes`(`name`) VALUES (:nameArg)";
    // On prépare la requête sql
    $res = $db_connect->prepare($sql);
    // On exécute la requête sql
    $exec = $res->execute(array(":nameArg" => $nameArg));

    // vérifier si la requête d'insertion a réussi
    if ($exec) {
        echo '<div class="argonaute_response--box"><p class="argonaute_response--valid">l\'argonaute a bien rejoint l\'équipage !!</p></div>';
    } else {
        echo '<div class="argonaute_response--box"><p class="argonaute_response--fail">L\'argonautes n\'a pas pu embarquer avec le reste de l\'équipage</p></div>';
    }
}
?>

    <!-- Member list -->
    <h2>Membres de l'équipage</h2>
    <?php

// Afficher les valeurs de la base de donnée
$sql = "SELECT * FROM argonautes";
$fetchQuery = $db_connect->query($sql);
$fetchData = $fetchQuery->fetch();

if ($fetchData === false) {
    echo '<h3>Il n\'y a aucun nom!</h3>';
} else {
    // On affiche chaque entrée une à une

    do {
        ?>
                <section class="member-list">
                    <div class="member-item">
                        <img class="member-icon" src="img/helmet.png">
                        <p><?php echo $fetchData['name']; ?></p>
                        <a href="delete.php?id=<?=$fetchData["id"];?>">
                            <img class="member-icon" src="img/bin.png" alt="poubelle">
                        </a>
                    </div>
                </section>
            <?php
} while ($fetchData = $fetchQuery->fetch());
    $fetchData = "";
}

?>

  </main>

  <?php

// footer
require "footer.php";?>
