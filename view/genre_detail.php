<?php

ob_start();

?>

<?php

$genreDetail = $sql->fetchAll();

foreach ($genreDetail as $detail) {
    var_dump($genreDetail);
?>


    

<?php
}
?>

<?php

$content = ob_get_clean();
$title = "Genre";
$secondTitle = "Genre";
require 'template.php';

?>