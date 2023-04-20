<?php

ob_start();

?>



<?php

$content = ob_get_clean();
$title = "Directors";
$secondTitle = "Directors";
require 'template.php';

?>