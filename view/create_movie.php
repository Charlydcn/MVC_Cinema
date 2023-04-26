<?php

ob_start();

?>

<?php

    if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }

?>

    <form class="row w-50 g-3 p-3 m-3 border" action="index.php?action=createMovie" method="POST" enctype="multipart/form-data" autocomplete="off">

        <div class="col-md-6"> <!-- TITLE -->
            <label class="form-label">
                Title :
                <input type="text" name="title" class="form-control" required>
            </label>
        </div>

        <div class="col-md-6" > <!-- RELEASE DATE -->
            <label class="form-label">
                Release date :
                <input type="date" name="release_date" class="form-control" min="1900-01-01" max="2023-12-31" required>
            </label>
        </div>

        <div class="col-md-6" > <!-- DURATION -->
            <label class="form-label">
                Duration :
                <div class="input-group mb-2">
                    <input type="number" name="length" class="form-control" min="0" max="500" required>
                    <div class="input-group-prepend">
                        <div class="input-group-text">minutes</div>
                    </div>
                </div>
            </label>
        </div>

        <div class="col-md-6" >  <!-- RATING -->
            <label class="form-label">
                Rating :
                <div class="input-group mb-2">
                    <input type="number" name="rating" class="form-control" step="0.5" min="0" max="5" required>
                    <div class="input-group-prepend">
                        <div class="input-group-text">/5</div>
                    </div>
                </div>
            </label>
        </div>

        <div class="col-md-6" > <!-- SYNOPSIS -->
            <label class="form-label">
                Synopsis :
                <textarea type="text" name="synopsis" class="form-control" rows=3 style="resize:none;"required></textarea>
            </label>
        </div>

        <div class="col-md-6"> <!-- DIRECTOR & POSTER -->
            <div class="col-md-12"> <!-- DIRECTOR -->
            
                <label>
                    Director :
                    <select name="directors" class="form-select">
                </label>
                    <option value="" selected disabled>Choose...</option>    
                <?php
                foreach($directors as $director) {
                ?>
    
                    <option value="<?=$director['id_director']?>"><?=$director['first_name'] . " " .  $director['last_name']?></option>
    
                <?php } ?>
    
                </select>
            </div>
    
            <div class="col-md-12"> <!-- POSTER -->
    
                <div>
                    <label>
                        Poster : 
                        <input type="file" name="poster" class="form-control">
                    </label>
                </div>
    
            </div>
        </div>

        <div class="col-md-12">  <!-- GENRES -->
            
                <?php
                foreach ($genres as $genre) {
                ?>

                    <div class="form-check">

                        <label class="form-check-label">
                            <?=$genre['genre_name']?>
                            <input name="genre<?=$genre['id_movie_genre']?>" class="form-check-input" type="checkbox" value="<?=$genre['id_movie_genre']?>">
                        </label>
                    
                    </div>

                <?php } ?>

            <small class="lh-1 text-muted">(3 genres max.)</small>
        </div>

        <div class="col-md-12 d-flex justify-content-end"> <!-- SUBMIT -->
            <input type="submit" name="submit" value="Create movie" class="btn btn-primary w-25">
        </div>
        
    </form>

<?php

$content = ob_get_clean();
$title = "Creation";
$secondTitle = "Creation";
require 'template.php';

?>