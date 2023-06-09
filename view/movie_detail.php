<?php

ob_start();

?>



<?php

$movieDetail = $sqlDetail->fetch();

?>

<div class="m-3">
    <div class="card mb-3" style="max-width: 1024px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="public/img/posters/<?= $movieDetail['poster'] ?>" alt="poster <?= $movieDetail['title'] ?>" class="img-fluid rounded-start">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h2 class="card-title"><?= $movieDetail['title'] ?> (<?= $movieDetail['release_date'] ?>)</h2>
                    <br>
                    <p class="card-text fw-bold lh-1">Genre(s) :</p>
                    <p><?= $movieDetail['genres'] ?></p>

                    <p class="card-text fw-bold lh-1">Duration :</p>
                    <p><?= $movieDetail['length'] ?></p>

                    <p class="card-text fw-bold lh-1">Director :</p>
                    <p><a class="text-decoration-none text-reset" href="index.php?action=director_detail&id=<?= $movieDetail['id_director'] ?>"><?= $movieDetail['first_name'] . " " . $movieDetail['last_name'] ?></a></p>

                    <p class="card-text fw-bold">Synopsis :</p>
                    <p><?= $movieDetail['synopsis'] ?></p>

                    <p class="card-text fw-bold lh-1">Rating :</p>
                    <p><?= $movieDetail['rating'] ?>/5</p>

                    <p class="card-text">
                        <a class="text-decoration-none" href="">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>

                        <a class="text-decoration-none m-3" href="index.php?action=deleteMovie&id=<?= $movieDetail['id_movie'] ?>">
                            <i class="fa-sharp fa-solid fa-trash text-danger"></i>
                        </a>
                    </p>
                </div>
            </div>
        </div>


    </div>

    <div class="my-4">
        <a href="index.php?action=casting&id=<?= $movieDetail['id_movie'] ?>" class="btn btn-outline-secondary">Edit movie casting</a>
    </div>

    <p class="fs-4">Casting :</p>

    <?php

    foreach ($sqlCasting->fetchAll() as $casting) {
    ?>


        <ul>
            <a class="text-decoration-none text-reset" href="index.php?action=actor_detail&id=<?= $casting['id_actor'] ?>">
                <li><span class="fw-bold"><?= $casting['first_name'] . " " . $casting['last_name'] . "</span> (" . $casting['role_name'] . ") " ?></li>
            </a>
        </ul>


    <?php } ?>

</div>

<?php

$content = ob_get_clean();
$title = $movieDetail['title'];
$secondTitle = "Movie";
require 'template.php';

?>