<?php

ob_start();

?>

<?php 

$directorDetail = $sqlDetail->fetch();
$directorMovies = $sqlMovies->fetchAll();

?>

<div class="card mb-3" style="max-width: 1024px;">
  <div class="row g-0">

    <div class="col-md-4">
        <img src="public/img/<?= $directorDetail['portrait'] ?>" alt="portrait <?= $director['first_name'] . " " . $director['last_name']?>" class="img-fluid rounded-start">
    </div>

    <div class="col-md-8">
      <div class="card-body">
        
        <h2 class="card-title">
            <?= $directorDetail['first_name'] . " " . $directorDetail['last_name'] ?>
        </h2>

        <p class="card-text fw-bold lh-1">Birth-date :</p>
        <p><?= $directorDetail['birthdate']?></p>

        <p class="card-text fw-bold lh-1">Genre :</p>
        <p><?= $directorDetail['genre'] ?></p>

        <p class="card-text">
            <small>
                <a class="text-decoration-none" href="">
                    <i class="fa-solid fa-pen-to-square"></i>    
                </a>
            </small>
        </p>

      </div>
    </div>
  </div>
</div>

<p class="fs-4">Movie(s) :</p>

<?php

foreach($directorMovies as $movie) {

?>

<p class="lh-1"><a class="text-decoration-none text-reset fw-bold" href="index.php?action=movie_detail&id=<?=$movie['id_movie']?>"><?= $movie['title']?></a><?=" (" . $movie['release_date'] . ")"?></p>

<?php } ?>

<?php

$content = ob_get_clean();
$title = "Director";
$secondTitle = "Director";
require 'template.php';

?>