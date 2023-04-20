<?php

ob_start();

?>



<?php

$content = ob_get_clean();
$title = "Actor";
$secondTitle = "Actor";
require 'template.php';

?>