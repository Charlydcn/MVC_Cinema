<?php

ob_start();

?>
        
<div id="movie_cards">

    <article class="movie_card">
        
    </article>

    <article class="movie_card">
        
    </article>

    <article class="movie_card">
        
    </article>

    <article class="movie_card">
        
    </article>

    <article class="movie_card">
        
    </article>

    <article class="movie_card">
        
    </article>

    <article class="movie_card">
        
    </article>

</div>


<?php

$content = ob_get_clean();
$title = "Movies";
$secondTitle = "Movies";
require 'template.php';

?>