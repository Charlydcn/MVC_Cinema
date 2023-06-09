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
                <img src="public/img/portraits/<?= $director['portrait'] ?>" alt="portrait <?= $director['first_name'] . " " . $director['last_name'] ?>" class="rounded-circle" style="width: 200px; height: 200px; object-fit: cover;">
                <h5 class="text-center fw-semibold"><?= $director['first_name'] . " " . $director['last_name'] ?></h5>
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