<?php

ob_start();

?>

<?php

$actorDetail = $sqlDetail->fetch();
$actorMovies = $sqlMovies->fetchAll();

?>

<div class="card mb-3" style="max-width: 1024px;">
  <div class="row g-0">

    <div class="col-md-4">
      <img src="public/img/<?= $actorDetail['portrait'] ?>" alt="portrait <?= $actorDetail['first_name'] . " " . $actorDetail['last_name'] ?>" class="img-fluid rounded-start">
    </div>

    <div class="col-md-8">
      <div class="card-body">

        <h2 class="card-title">
          <?= $actorDetail['first_name'] . " " . $actorDetail['last_name'] ?>
        </h2>

        <p class="card-text fw-bold lh-1">Birth-date :</p>
        <p><?= $actorDetail['birthdate'] ?></p>

        <p class="card-text fw-bold lh-1">Genre :</p>
        <p><?= $actorDetail['genre'] ?></p>

        <p class="card-text">
          <small>
            <a class="text-decoration-none" href="index.php?action=edit_person&id=<?= $actorDetail['id_person'] ?>">
              <i class="fa-solid fa-pen-to-square"></i>
            </a>
          </small>
        </p>

      </div>
    </div>
  </div>
</div>

<p class="fs-4">Movie played :</p>

<?php

foreach ($actorMovies as $movie) {

?>

  <p class="lh-1"><a class="text-decoration-none text-reset fw-bold" href="index.php?action=movie_detail&id=<?= $movie['id_movie'] ?>"><?= $movie['title'] ?></a><?= " (" . $movie['release_date'] . ")" ?></p>
  <p><span class="fw-bold">Role : </span><?= $movie['role_name'] ?></p>

<?php } ?>

<?php

$content = ob_get_clean();
$title = $actorDetail['first_name'] . " " . $actorDetail['last_name'];
$secondTitle = "Actor";
require 'template.php';

?>