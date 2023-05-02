<?php

ob_start();

?>

<?php

if (isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}

?>

<div class="w-100 d-flex justify-content-end p-1">
    <a href="index.php?action=createMovie" class="btn btn-outline-secondary">Create movie</a>
</div>

<div class="row m-3">

    <?php

    foreach ($sql->fetchAll() as $movie) { ?>

        <div class="col-lg-2">
            <a class="text-decoration-none text-reset" href="index.php?action=movie_detail&id=<?= $movie['id_movie'] ?>">
                <img src="public/img/posters/<?= $movie['poster'] ?>" alt="poster <?= $movie['title'] ?>" style="width: 200px; height: 300px; object-fit: cover;">
                <h5 class="text-center fw-semibold"><?= $movie['title'] ?> (<?= $movie['release_date'] ?>)</h5>
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