<?php

ob_start();

?>



<?php

$content = ob_get_clean();
$title = "Genres";
$secondTitle = "Genres";
require 'template.php';

?>