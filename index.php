<?php

use Controller\CinemaController;

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

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
            $ctrlCinema->movieCasting($id);

            break;

        // *********************************************************
        // ACTORS **************************************************

        case "actors":

            $ctrlCinema->listActors();

            break;


        case "actor_detail":

            $ctrlCinema->actorDetail($id);
            $ctrlCinema->actorMovies($id);

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

    }
}
