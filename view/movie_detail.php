<?php

ob_start();

?>



<?php

$content = ob_get_clean();
$title = "Movie";
$secondTitle = "Movie";
require 'template.php';

?>