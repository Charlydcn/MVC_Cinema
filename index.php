<?php

use Controller\CinemaController;

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

session_start();

$ctrlCinema = new CinemaController();

$id = (isset($_GET['id'])) ? $_GET['id'] : null;

if (isset($_GET['action'])) {
    switch ($_GET['action']) {

            // MOVIES **************************************************

        case "movies":

            $ctrlCinema->listMovies();

            break;


        case "movie_detail":

            $ctrlCinema->movieDetail($id);

            break;

            // *********************************************************
            // ACTORS **************************************************

        case "actors":

            $ctrlCinema->listActors();

            break;


        case "actor_detail":

            $ctrlCinema->actorDetail($id);

            break;

            // *********************************************************
            // DIRECTORS **************************************************

        case "directors":

            $ctrlCinema->listDirectors();

            break;


        case "director_detail":

            $ctrlCinema->directorDetail($id);

            break;

            // *********************************************************
            // GENRE **************************************************

        case "genres":

            $ctrlCinema->listGenres();

            break;


        case "genre_detail":

            $ctrlCinema->genreDetail($id);

            break;

            // *********************************************************
            // DASHBOARDS **********************************************

        case "edit_person":

            $ctrlCinema->editPerson($id);

            break;

        case "updatePerson":

            if (isset($_POST['submit'])) {
                $first_name = filter_input(INPUT_POST, "first_name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $last_name = filter_input(INPUT_POST, "last_name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $birthdate = filter_input(INPUT_POST, "birthdate");
                $genre = filter_input(INPUT_POST, "genre");
                $isActor = filter_input(INPUT_POST, "isActor", FILTER_VALIDATE_BOOL);
                $isDirector = filter_input(INPUT_POST, "isDirector", FILTER_VALIDATE_BOOL);


                //************************ IMAGE *********************************

                if (isset($_FILES['portrait'])) {
                    $imgTmpName = $_FILES['portrait']['tmp_name'];
                    $imgName = $_FILES['portrait']['name'];
                    $imgSize = $_FILES['portrait']['size'];
                    $imgError = $_FILES['portrait']['error'];

                    $tabExtension = explode('.', $imgName);
                    $extension = strtolower(end($tabExtension));

                    //Tableau des extensions que l'on accepte
                    $extensions = ['jpg', 'png', 'jpeg', 'gif'];
                    $maxSize = 5000000;

                    if (in_array($extension, $extensions) && $imgSize <= $maxSize && $imgError == 0) {
                        $uniqueName = uniqid('', true); // uniqid génère un ID random (exemple 5f586bf96dcd38.73540086)
                        $portrait = $uniqueName . '.' . $extension;
                        move_uploaded_file($imgTmpName, 'public/img/' . $portrait);
                    }
                }
                //****************************************************************

                if ($isActor === null) {
                    $isActor = false;
                }

                if ($isDirector === null) {
                    $isDirector = false;
                }


                if ($first_name && $last_name && $birthdate && $genre && is_bool($isActor) && is_bool($isDirector)) {

                    if ($isActor === true || $isDirector === true) {
                        $ctrlCinema->updatePerson($id, $first_name, $last_name, $birthdate, $genre, $isActor, $isDirector);

                        if (isset($portrait) && $portrait != null) {
                            $ctrlCinema->updatePortrait($id, $portrait);
                        }

                        $_SESSION['message'] = "<p class='text-success fw-semibold fs-4'>Person successfully modified</p>";
                    } else {
                        $_SESSION['message'] = "<p class='text-danger fw-semibold fs-4'>Person has to be either an actor, or a director<p>";
                    }
                } else {

                    $_SESSION['message'] = "<p class='text-danger fw-semibold fs-4'>Error<p>";
                }
            }

            Header("Location:index.php?action=edit_person&id=$id");

            break;
    }
}
