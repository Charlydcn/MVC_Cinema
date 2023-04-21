<?php

ob_start();

?>

<div class="row">

    <?php

    foreach ($sql->fetchAll() as $movie) { ?>

        <div class="col-lg-2">
            <a class="text-decoration-none text-reset" href="">
                <figure>
                    <img src="public/img/<?= $movie['poster'] ?>" alt="portrait <?= $movie['title'] ?>" class="img-thumbnail">
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