<?php

ob_start();

?>

<table class="table table-striped table-dark">
    <thead>
        <tr>
            <th scope="col">Title</th>
            <th scope="col">Release date</th>
        </tr>
    </thead>

    <tbody>

        <?php

        foreach ($sql->fetchAll() as $movie) { ?>
            <tr>
                <td>
                    <a class="text-decoration-none text-reset" href="index.php?movie_detail&id=<?= $movie['id_movie'] ?>">
                        <?= $movie['title'] ?>
                    </a>
                </td>
                <td><?= $movie['release_date'] ?></td>
            </tr>


        <?php } ?>

    </tbody>
</table>

<?php

$content = ob_get_clean();
$title = "Movies";
$secondTitle = "Movies";
require 'template.php';

?>