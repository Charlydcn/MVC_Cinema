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

            $ctrlCinema->updatePerson($id);

            break;

        case "deletePerson":

            $ctrlCinema->deletePerson($id);

            Header("Location:index.php?action=actors");

            break;

        case "createPersonDashboard":

            $ctrlCinema->createPersonDashboard();

            break;

        case "createPerson":

            $ctrlCinema->createPersonDashboard();

            break;

        case "createMovie":

            $ctrlCinema->createMovie();

            break;
    }
}
