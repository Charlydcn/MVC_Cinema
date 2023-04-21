<?php

ob_start();

?>

<div class="row">

    <?php

    foreach ($sql->fetchAll() as $director) { ?>

        <div class="col-lg-2">
            <a class="text-decoration-none text-reset" href="">
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