<? // TODO :
// Quand on selectionne aucune option, alors c'est fixed qui est automatiquement mise !
// Régler le problème de devoir appuyer plusieurs fois sur le boutton
// Rajouter les fonctions de l'ordinateur qui boit ?>

<?php require 'Session.class.php' ?>
<?php require 'config.php' ?>

<?php Session::start(); ?>

<?php
if (isset($_GET['action'])) {
  if ($_GET['action'] == "logout") {
    Session::logout();
  }
}

if (!Session::get("username")) {
  $name =  "Matthieu";
  Session::set("username", $name);
  $tries =  0;
  Session::set("usertries", $tries);
  Session::set("generated", 1);
  //print_r("Nouvelle session ! ");
  //print_r(Session::get("username"));
}
?>


<?php
$games = ["first" => "fixed", "second" => "random", "third" => "drunk"];
?>


<?php require 'header.php' ?>
<?php require 'jeu.php' ?>

<?php $jeu = new Jeu();
$jeu->deviner(isset($_GET['chiffre']) ? $_GET['chiffre'] : NULL);
?>

<p> Il faut deviner : <?= $jeu->getADeviner() ?> </p>

<div class="alert alert-info">
  <?= 'nb essais:' . Session::get("usertries") ?>
</div>


<?php
if (isset($_GET['games'])) {
  $games_checkbox = $_GET['games'];
  if (count($games_checkbox) > 1) {
?> <div class="alert alert-danger"> Trop d'option de selectionné ! </div> <?php
  } elseif (count($games_checkbox) == 1) {
    Session::set("checkbox_select", $games_checkbox[0]);
  } elseif (count($games_checkbox) == 0) {
    Session::set("checkbox_select", "first");
    ?> <div class="alert alert-info"> Option automatique ! </div> <?php
  }
}
    ?>



<?php if ($jeu->getMessage() == 1) : ?>
  <div class="alert alert-danger">
    <?= "trop grand" ?>
  </div>
<?php elseif ($jeu->getMessage() == 2) : ?>
  <div class="alert alert-danger">
    <?= "trop petit" ?>
  </div>
<?php elseif ($jeu->getMessage() == 0) : ?>
  <div class="alert alert-success">
    <?= "Bravo" ?>
  </div>
<?php endif ?>


<main role="main" class="container">
  <form class="form-inline my-2 my-lg-4" action="index.php" method="GET">
    <?php foreach ($games as $game => $type) : ?>
      <div class="form-check">
        <label>
          <?php if (Session::get("checkbox_select") == $game) : ?>
            <!-- Pour laisser la case cocher -->
            <input type="checkbox" class="form-check-input" name="games[]" value="<?php echo Session::get("checkbox_select") ?>" checked>
            <?= $type ?>
          <?php else : ?>
            <input type="checkbox" class="form-check-input" name="games[]" value="<?= $game ?>">
            <?= $type ?>
          <?php endif ?>
        </label>
      </div>
    <?php endforeach; ?>

    <?php
    if (Session::get("generated") == 1) {
    ?> <button class="btn btn-secondary my-2 my-sm-0" type="submit">JOUER</button> <?php
    } elseif ($jeu->getMessage() != 0) {
      ?> <input class="form-control mr-sm-2" type="number" placeholder="entre 1 et 100" name="chiffre" value="<?= $jeu->getValue() ?>">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Devinez</button> <?php
    }
      ?>
  </form>
</main>

<?php require 'footer.php' ?>