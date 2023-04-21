<?php

ob_start();

?>

<?php
foreach ($sql->fetchAll() as $genre) {
?>

    <ul>
        <li class="list-inline-item">
            <a class="text-decoration-none text-reset fs-3" href="index.php?action=genre_detail&id=<?= $genre['id_movie_genre'] ?>">
                <?= $genre['genre_name'] ?>

            </a>

            (<?= $genre['count'] ?>)
        </li>
    </ul>

<?php } ?>

<?php

$content = ob_get_clean();
$title = "Genres";
$secondTitle = "Genres";
require 'template.php';

?>