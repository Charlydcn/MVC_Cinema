<?php

namespace Controller;

use Model\Connect;

class CinemaController
{

    // MOVIES **************************************************
    public function listMovies()
    {
        $pdo = Connect::dbConnect();

        $sql = $pdo->query(
            "SELECT id_movie, title, YEAR(release_date) AS 'release_date', poster
            FROM movie"
        );

        require "view/movies.php";
    }

    // QUERY = PAS D'ELEMENT VARIABLE DANS LA REQUETE SQL (ex: $id)
    // PREPARE + EXECUTE = ELEMENT VARIABLE DANS LA REQUETE

    public function movieDetail($id)
    {
        $pdo = Connect::dbConnect();

        $sqlDetail = $pdo->prepare(
            "SELECT title, YEAR(release_date) AS 'release_date', SEC_TO_TIME(length*60) AS 'length', first_name, last_name, synopsis, rating, poster, GROUP_CONCAT(genre_name) AS 'genres', movie.id_director
            FROM movie
            INNER JOIN director ON movie.id_director = director.id_director
            INNER JOIN person ON director.id_person = person.id_person
            INNER JOIN set_movie_genre ON movie.id_movie = set_movie_genre.id_movie
            INNER JOIN movie_genre ON movie_genre.id_movie_genre = set_movie_genre.id_movie_genre
            WHERE movie.id_movie = :id"
        );

        $sqlDetail->execute(["id" => $id]);

        $sqlCasting = $pdo->prepare(
            "SELECT first_name, last_name, role_name, actor.id_actor
            FROM person
            INNER JOIN actor ON person.id_person = actor.id_person
            INNER JOIN casting ON actor.id_actor = casting.id_actor
            INNER JOIN movie ON casting.id_movie = movie.id_movie
            INNER JOIN role ON casting.id_role = role.id_role
            WHERE movie.id_movie = :id"
        );

        $sqlCasting->execute(["id" => $id]);

        require "view/movie_detail.php";
    }

    // *********************************************************
    // ACTORS **************************************************

    public function listActors()
    {
        $pdo = Connect::dbConnect();

        $sql = $pdo->query(
            "SELECT *
            FROM person
            INNER JOIN actor ON person.id_person = actor.id_person"
        );

        require "view/actors.php";
    }

    public function actorDetail($id)
    {
        $pdo = Connect::dbConnect();

        $sqlDetail = $pdo->prepare(
            "SELECT *
            FROM person
            INNER JOIN actor ON person.id_person = actor.id_person
            WHERE id_actor = :id"
        );

        $sqlDetail->execute(["id" => $id]);


        $sqlMovies = $pdo->prepare(
            "SELECT title, YEAR(release_date) AS 'release_date', role_name, movie.id_movie
            FROM movie
            INNER JOIN casting ON movie.id_movie = casting.id_movie
            INNER JOIN role ON casting.id_role = role.id_role
            INNER JOIN actor ON casting.id_actor = actor.id_actor
            WHERE actor.id_actor = :id
            ORDER BY release_date ASC"
        );

        $sqlMovies->execute(["id" => $id]);

        require "view/actor_detail.php";
    }

    // *********************************************************
    // DIRECTORS ***********************************************

    public function listDirectors()
    {
        $pdo = Connect::dbConnect();

        $sql = $pdo->query(
            "SELECT *
            FROM person
            INNER JOIN director ON person.id_person = director.id_person"
        );

        require "view/directors.php";
    }

    public function directorDetail($id)
    {
        $pdo = Connect::dbConnect();

        $sqlDetail = $pdo->prepare(
            "SELECT *
            FROM person
            INNER JOIN director ON person.id_person = director.id_person
            WHERE id_director = :id"
        );

        $sqlDetail->execute(["id" => $id]);

        $sqlMovies = $pdo->prepare(
            "SELECT *
            FROM movie
            INNER JOIN director ON movie.id_director = director.id_director
            WHERE movie.id_director = :id"
        );

        $sqlMovies->execute(["id" => $id]);

        require "view/director_detail.php";
    }

    // *********************************************************
    // GENRES **************************************************

    public function listGenres()
    {
        $pdo = Connect::dbConnect();

        $sql = $pdo->query(
            "SELECT movie_genre.id_movie_genre, movie_genre.genre_name, COUNT(title) AS 'count'
            FROM movie
            INNER JOIN set_movie_genre ON movie.id_movie = set_movie_genre.id_movie
            INNER JOIN movie_genre ON set_movie_genre.id_movie_genre = movie_genre.id_movie_genre
            GROUP BY movie_genre.id_movie_genre, movie_genre.genre_name
            ORDER BY COUNT(title) DESC"
        );

        require "view/genres.php";
    }

    public function genreDetail($id)
    {
        $pdo = Connect::dbConnect();

        $sql = $pdo->prepare(
            "SELECT GROUP_CONCAT(movie_genre.genre_name) AS 'genre', title, movie_genre.id_movie_genre AS 'id_genre', movie.id_movie AS 'id_movie', poster, YEAR(release_date) AS 'release_date', genre_name
            FROM movie
            INNER JOIN set_movie_genre ON movie.id_movie = set_movie_genre.id_movie
            INNER JOIN movie_genre ON set_movie_genre.id_movie_genre = movie_genre.id_movie_genre
            WHERE set_movie_genre.id_movie_genre = :id
            GROUP BY movie_genre.genre_name, title, movie_genre.id_movie_genre,  movie.id_movie"
        );

        $sql->execute(["id" => $id]);

        require "view/genre_detail.php";
    }

    // *********************************************************
    // DASHBOARDS **********************************************

    public function personDashboard($id)
    {

        $pdo = Connect::dbConnect();


        $checkActorQuery = $pdo->prepare(
            "SELECT *
            FROM person
            INNER JOIN actor ON person.id_person = actor.id_person
            WHERE person.id_person = :id"
        );

        $checkDirectorQuery = $pdo->prepare(
            "SELECT *
            FROM person
            INNER JOIN director ON person.id_person = director.id_person
            WHERE person.id_person = :id"
        );

        $checkActorQuery->execute(["id" => $id]);
        $checkDirectorQuery->execute(["id" => $id]);

        $isActor = $checkActorQuery->fetch();
        $isDirector = $checkDirectorQuery->fetch();

        if (!empty($isActor) && !empty($isDirector)) { // SI ACTEURS ET REALISATEUR...

            $detailQuery = $pdo->prepare(
                "SELECT first_name, last_name, birthdate, genre, portrait
                FROM person
                INNER JOIN actor ON person.id_person = actor.id_person
                WHERE actor.id_person = :id"
            );

            $detailQuery->execute(["id" => $id]);

            $isActor = "checked";
            $isDirector = "checked";
        } elseif (!empty($isActor)) { // SI ACTEUR...

            $detailQuery = $pdo->prepare(
                "SELECT first_name, last_name, birthdate, genre, portrait
                FROM person
                INNER JOIN actor ON person.id_person = actor.id_person
                WHERE actor.id_person = :id"
            );

            $detailQuery->execute(["id" => $id]);

            $isActor = "checked";
            $isDirector = "";
        } elseif (!empty($isDirector)) { // SI REALISATEUR...

            $detailQuery = $pdo->prepare(
                "SELECT first_name, last_name, birthdate, genre, portrait
                FROM person
                INNER JOIN director ON person.id_person = director.id_person
                WHERE director.id_person = :id"
            );

            $detailQuery->execute(["id" => $id]);

            $isDirector = "checked";
            $isActor = "";
        } else { // SINON...
            // ...
        }

        require "view/person_dashboard.php";
    }

    public function updatePerson($first_name, $last_name, $birthdate, $genre, $isActor, $isDirector, $portrait)
    {
        // var_dump($id);
        // var_dump($first_name);
        // var_dump($last_name);
        // var_dump($birthdate);
        // var_dump($genre);
        // var_dump($isActor);
        // var_dump($isDirector);
        // var_dump($portrait);
    }
}
