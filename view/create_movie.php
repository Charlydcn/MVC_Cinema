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
                <div class="input-group mb-2 w-75">
                    <input type="number" name="length" class="form-control" min="0" required>
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

        <div class="col-md-6">
            <div>  <!-- DIRECTOR -->
                <label>
                    Director :
                    <select name="directors" class="form-select">
                </label>
    
                <?php
                foreach($directors as $director) {
                ?>
    
                    <option value="<?=$director['id_director']?>"><?=$director['first_name'] . " " .  $director['last_name']?></option>
    
                <?php } ?>
    
                </select>
            </div>

            <div>
                <label>
                    Poster : 
                    <input type="file" name="poster" class="form-control">
                </label>
            </div>

        </div>

        <div class="col-md-4" >  <!-- GENRE 1 -->
            <label class="form-label">
                Genre 1 : 
                <select name="genres1" class="form-select">
                    <option value="genre0" selected>-</option>

                <?php
                foreach ($genres as $genre) {
                ?>

                    <option value="<?= $genre['id_movie_genre'] ?>"> <?=$genre['genre_name']?> </option>
                    
                <?php } ?>

                </select>

            </label>
        </div>

        <div class="col-md-4" > <!-- GENRE 2 -->
            <label class="form-label">
                Genre 2 : 
                <select name="genres3" class="form-select">
                    <option value="genre0" selected>-</option>

                <?php
                foreach ($genres as $genre) {
                ?>

                    <option value="<?= $genre['id_movie_genre'] ?>"> <?=$genre['genre_name']?> </option>
                    
                <?php } ?>

                </select>

            </label>
        </div>

        <div class="col-md-4" > <!-- GENRE 3 -->
            <label class="form-label">
                Genre 3 : 
                <select name="genres2" class="form-select">
                    <option value="genre0" selected>-</option>

                <?php
                foreach ($genres as $genre) {
                ?>

                    <option value="<?= $genre['id_movie_genre'] ?>"> <?=$genre['genre_name']?> </option>
                    
                <?php } ?>

                </select>

            </label>            
        </div>
        <small class="lh-1 text-muted">(3 genres max.)</small>

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