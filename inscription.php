<?php

    $title = "Inscription";
    include("include/init.php");

    // Recpetion du formulaire et inscription de la personne
    if(!empty($_POST)){

      
      $Mail=$_POST['Mail'];
      $Pseudo=$_POST['Pseudo'];
      $MDP=$_POST['MDP'];

      $sql = "INSERT INTO utilisateurs (mail, pseudo, mdp) VALUES ('$Mail', '$Pseudo', '$MDP')";
      $result = mysqli_query($bdd, $sql);

      if($result) {
        // Add avec success
        header("Location: index.php");
      } else {
        // Formulaire echec
        echo "Une erreur est survenu";
      }
    }


    include("include/header.php");

?>


<!-- Création du header = contenu de la page-->
<header class="page-header header container-fluid">

  <!-- Le script permet la mise en place d'une image de fond, à personneliser avec CSS-->
    <script type="text/javascript">
    $(document).ready(function(){
      $('.header').height($(window).height());
      });
    </script>

    <div class="overlay"></div>  <!--Permet de superposer sur le fond d'écran-->
</header>

<div class="overlay"></div>


<!--Création du formulaire-->
<div class="Formulaire" style="text-align: center;">

  <h3>Complétez le formulaire suivant pour vous inscrire :</h3><br>

  <!--Champs du formulaire-->
  <form method="POST">
    <table>
      <p>L'ensemble des champs est obligatoire</p>


      <!--Champs de l'adresse e-mail-->
      <tr>
        <td><label>E-Mail :</label></td>
        <td><input type="mail" name="Mail" placeholder="E-mail" required></td>
      </tr>

      <!--Champs du pseudo de l'utilisateur-->
      <tr>
        <td><label>Pseudo :</label></td>
        <td><input type="text" name="Pseudo" placeholder="Pseudo" required></td>
      </tr>

      <!--Champs du mot de passe-->
      <tr>
        <td><label>Mot de passe :</label></td>
        <td><input type="password" name="MDP" placeholder="Mot de passe" required></td>
      </tr>

    </table>


  <!--Case d'acceptation de la charte-->
  <div>
      <input type="checkbox" name="Accepter" required>
      <label for="Accepter">J'accepte la charte du site</label>
  </div>

  <!--Permet l'accession à la charte-->
  <p>Pour aller à la charte, <a href="charte.php">cliquez ici</a></p>

  <!--Bouton de soumission de l'inscription-->
  <tr colspan="2">
    <td><input type="submit" name="Inscription" value="Inscription"></td>
  </tr>

  </form>

</div>


<?php
  include("include/footer.php");
 ?>
