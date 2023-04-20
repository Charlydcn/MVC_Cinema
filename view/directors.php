<?php

ob_start();

?>



<?php

$content = ob_get_clean();
$title = "Directors";
require 'template.php';

?>