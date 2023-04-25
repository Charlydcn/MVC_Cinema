<?php

ob_start();

?>

<div class="w-100 d-flex justify-content-end p-1">
    <a href="index.php?action=createPerson" class="btn btn-outline-secondary">Create director</a>
</div>

<div class="row">

    <?php

    foreach ($sql->fetchAll() as $director) { ?>

        <div class="col-lg-2">
            <a class="text-decoration-none text-reset" href="index.php?action=director_detail&id=<?= $director['id_director'] ?>">
                <figure>
                    <img src="public/img/<?= $director['portrait'] ?>" alt="portrait <?= $director['first_name'] . " " . $director['last_name'] ?>" class="rounded-circle img-thumbnail">
                    <figcaption class="text-center fw-semibold"><?= $director['first_name'] . " " . $director['last_name'] ?></figcaption>
                </figure>
            </a>

        </div>


    <?php } ?>

</div>

<?php

$content = ob_get_clean();
$title = "Directors";
$secondTitle = "Directors";
require 'template.php';

?>