<?php

ob_start();

?>



<?php

$movieDetail = $sqlDetail->fetch();

?>

<div class="row featurette">
    <div class="col-md-7 order-md-2">

        <p class="fs-3 fw-semibold"><?= $movieDetail['title'] ?> (<?= $movieDetail['release_date'] ?>)</p>

        <p class="fw-bold lh-1">Genre(s) :
        <p><?= $movieDetail['genres'] ?></p>

        <p class="fw-bold lh-1">Duration :
        <p><?= $movieDetail['length'] ?></p>

        <p class="fw-bold lh-1">Director : </p>
        <p><?= $movieDetail['first_name'] . " " . $movieDetail['last_name'] ?></p>

        <p class="fw-bold">Synopsis :</p>
        <p><?= $movieDetail['synopsis'] ?></p>

        <p class="fw-bold lh-1">Rating :</p>
        <p><?= $movieDetail['rating'] ?>/5</p>

    </div>

    <div class="col-md-5 order-md-1">
        <img src="public/img/<?= $movieDetail['poster'] ?>" alt="portrait <?= $movie['title'] ?>" class="img-thumbnail">
    </div>

</div>

<div>

    <?php

    foreach ($sqlCasting->fetchAll() as $casting) {
    ?>


        <ul>
            <a href="index.php?action=actor_detail&id=<?= $casting['id_actor'] ?>">
                <li><?= $casting['first_name'] . " " . $casting['last_name'] . " " . $casting['role_name'] ?></li>
            </a>
        </ul>

</div>

<?php

    }

    $content = ob_get_clean();
    $title = $movieDetail['title'];
    $secondTitle = $movieDetail['title'];
    require 'template.php';

?>