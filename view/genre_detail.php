<?php

ob_start();

?>

<div class="row">

<?php

$genreDetail = $sql->fetchAll();

foreach ($genreDetail as $detail) {

?>

    <div class="col-lg-2">
        <a class="text-decoration-none text-reset" href="index.php?action=movie_detail&id=<?= $detail['id_movie'] ?>">
            <figure>
                <img src="public/img/<?= $detail['poster'] ?>" alt="poster <?= $detail['title'] ?>" class="img-thumbnail">
                <figcaption class="text-center fw-semibold"><?= $detail['title'] ?> (<?= $detail['release_date'] ?>)</figcaption>
            </figure>
        </a>
    </div>


<?php } ?>

</div>

<?php

$content = ob_get_clean();
$title = $detail['genre_name'];
$secondTitle = "Genre";
require 'template.php';

?>