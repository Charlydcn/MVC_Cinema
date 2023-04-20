<?php

ob_start();

?>



<?php

$content = ob_get_clean();
$title = "Director";
$secondTitle = "Director";
require 'template.php';

?>