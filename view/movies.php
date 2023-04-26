<?php

ob_start();

?>

<div class="w-100 d-flex justify-content-end p-1">
    <a href="index.php?action=createMovie" class="btn btn-outline-secondary">Create movie</a>
</div>

<div class="row">

    <?php

    foreach ($sql->fetchAll() as $movie) { ?>

        <div class="col-lg-2">
            <a class="text-decoration-none text-reset" href="index.php?action=movie_detail&id=<?= $movie['id_movie'] ?>">
                <figure>
                    <img src="public/img/<?= $movie['poster'] ?>" alt="poster <?= $movie['title'] ?>" class="img-thumbnail" style="width:250px;">
                    <figcaption class="text-center fw-semibold"><?= $movie['title'] ?> (<?= $movie['release_date'] ?>)</figcaption>
                </figure>
            </a>

        </div>


    <?php } ?>

</div>

<?php

$content = ob_get_clean();
$title = "Movies";
$secondTitle = "Movies";
require 'template.php';

?>