<?php

ob_start();

?>



<?php

$content = ob_get_clean();
$title = "Genre";
$secondTitle = "Genre";
require 'template.php';

?>