<?php

ob_start();

?>

<?php 

$actorDetail = $sqlDetail->fetch();
$actorMovies = $sqlMovies->fetchAll();

?>

<div class="d-flex flex-row bd-highlight mb-3">
    <div class="col-md-7 order-md-2">

        <p class="fs-3 fw-semibold"><?= $actorDetail['first_name'] . " " . $actorDetail['last_name'] ?></p>

        <p class="fw-bold lh-1">Birth-date :
        <p><?= $actorDetail['birthdate'] ?></p>

        <p class="fw-bold lh-1">Genre :
        <p><?= $actorDetail['genre'] ?></p>

    </div>

    <figure class="col-md-5 order-md-1 w-25">
        <img src="public/img/<?= $actorDetail['portrait'] ?>" alt="portrait <?= $actor['first_name'] . " " . $actor['last_name']?>" class="img-fluid">
    </figure>
</div>

<p class="fs-4">Movie played :</p>

<?php

foreach($actorMovies as $movie) {

?>

<p class="lh-1"><a class="text-decoration-none text-reset fw-bold" href="index.php?action=movie_detail&id=<?=$movie['id_movie']?>"><?= $movie['title']?></a><?=" (" . $movie['release_date'] . ")"?></p>
<p>Role : <?= $movie['role_name'] ?></p>

<?php } ?>



<?php

$content = ob_get_clean();
$title = "Actor";
$secondTitle = "Actor";
require 'template.php';

?>