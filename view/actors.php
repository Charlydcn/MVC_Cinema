<?php

ob_start();

?>
<div class="w-100 d-flex justify-content-end p-1">
    <a href="index.php?action=createPerson" class="btn btn-outline-secondary">Create actor</a>
</div>

<div class="row">

    <?php

    foreach ($sql->fetchAll() as $actor) { ?>


        <div class="col-lg-2">
            <a class="text-decoration-none text-reset" href="index.php?action=actor_detail&id=<?= $actor['id_actor'] ?>">
                <img src="public/img/portraits/<?= $actor['portrait'] ?>" alt="portrait <?= $actor['first_name'] . " " . $actor['last_name'] ?>" class="rounded-circle" style="width: 200px; height: 200px; object-fit: cover;">
                <h5 class="text-center fw-semibold"><?= $actor['first_name'] . " " . $actor['last_name'] ?></h5>
            </a>
        </div>


    <?php } ?>

</div>
<?php

$content = ob_get_clean();
$title = "Actors";
$secondTitle = "Actors";
require 'template.php';

?>