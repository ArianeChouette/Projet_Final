<?php

// Insertion code init
  include("include/init.php");

// Foncction de récupération ID
// Si visite profil d'un vendeur/acheteur
  if(!empty($_GET["id"])){
    $user = getUser($_GET["id"]);
    $title = "Profil";
  }
// Si visite de son propre profil
  else {
    $title = "Mon compte";
    $user = $currentUser;
  }

// Requête de récupération des données de l'utilisateur
  $user_id = $user["id"];
  $all_object_vendu = mysqli_query($bdd, "SELECT * FROM objets WHERE id_vendeur = '$user_id'");

//Insertion de la barre navigateur sur la page
  include("include/header.php");

?>

<!--Partie principale/ corps de la page en HTML-->

      <div style="background-image: url(<?= $user["bg"] ?>); background-size: cover;">
          <!-- Séparation de l'écran en plusieurs cadres/colonnes-->
          <div class="container text-center">

            <div class="row">

              <!-- Première séparation de l'écran de manière horizontale = CADRE 1, occupe 3/12ème de la largeur-->
              <div class="col-sm-2 well">
                <img src="" alt="Photo de profil" title="Votre photo" style="height:150px; widht: 110px"><br><br>

                <!-- Récupération données utilisateur-->
                <p><?= $user["pseudo"] ?></p>
                <p><?= $user["mail"] ?></p>

                <!-- Vérification si statut utilisateur ou non-->
                <p><?= ($user["admin"]) ? "Administrateur" : "Utilisateur normal" ?></p>

                <!-- Fonction cacher "modif compte" si visiteur et non utilisateur-->
                <?php if($user == $currentUser): ?>
                  <a href="account_modif.php">Modifier mon profil</a>
                <?php endif; ?>
              </div>
              <!--Fin du cadre de gauche-->

              <!--Cadre du milieu-->
              <div class="col-sm-5">
              </div>
              <!--Fin cadre du milieu-->

              <!--Cadre de droite-->
              <div class="col-sm-4 well" style="margin-left: 50px">
                <p>Dernier achat</p>
                <p>Dernière vente</p>
                <ul>

                  <!-- Affichage des objets vendus (date, nom, prix) par l'utilisateur-->
                  <?php while ($data = mysqli_fetch_array($all_object_vendu)): ?>
                    <li><?= $data["date"] ?> : <?= $data["nom"] ?> à <?= $data["prix"] ?> €</li>
                  <?php endwhile;?>
                </ul>

              </div>
              <!--Fin du cadre de croite-->

            </div>

            <!-- Utilisateur et non visiteur -->
            <?php if($user == $currentUser): ?>
            <div class="row">
              <button class="btn btn-outline-secondary btn-lg" style="margin-right: 100px">
                <!-- Affichage "Vendre" si vendeur-->
                <?php if($currentUser["role"]): ?>
                  <a href="vente.php">Pour vendre un objet c'est ici</a>
                <!-- Affichage "Acheter" si acheteur-->
                <?php else: ?>
                  <a href="achat.php">Pour acheter un objet c'est ici</a>
                <?php endif; ?>
              </button>
              <br><br>
            </div>
          <?php endif; ?>

          </div>

        </div>

<?php

  // Insertion footer sur la page account
  include("include/footer.php");

 ?>
