<?php

ob_start();

?>



<?php

$content = ob_get_clean();
$title = "Actors";
require 'template.php';

?>