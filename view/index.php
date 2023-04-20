<?php

ob_start();

?>



<?php

$content = ob_get_clean();
$title = "Home";
require 'template.php';

?>