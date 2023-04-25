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

    public function editPerson($id)
    {
        $pdo = Connect::dbConnect();

        if ($this->checkIfActor($id) === true && $this->checkIfDirector($id) === true) { // SI ACTEURS ET REALISATEUR...

            $detailQry = $pdo->prepare(
                "SELECT *
                FROM person
                INNER JOIN actor ON person.id_person = actor.id_person
                WHERE person.id_person = :id"
            );

            $detailQry->execute(["id" => $id]);

            $isActor = "checked";
            $isDirector = "checked";
        } elseif ($this->checkIfActor($id) === true) { // SI ACTEUR...

            $detailQry = $pdo->prepare(
                "SELECT *
                FROM person
                INNER JOIN actor ON person.id_person = actor.id_person
                WHERE person.id_person = :id"
            );

            $detailQry->execute(["id" => $id]);

            $isActor = "checked";
            $isDirector = "";
        } elseif ($this->checkIfDirector($id) === true) { // SI REALISATEUR...

            $detailQry = $pdo->prepare(
                "SELECT *
                FROM person
                INNER JOIN director ON person.id_person = director.id_person
                WHERE person.id_person = :id"
            );

            $detailQry->execute(["id" => $id]);

            $isDirector = "checked";
            $isActor = "";
        } else {
            $isActor = "";
            $isDirector = "";
        }

        require "view/edit_person.php";
    }

    public function updatePerson($id, $first_name, $last_name, $birthdate, $genre, $isActor, $isDirector)
    {
        $pdo = Connect::dbConnect();

        $detailQry = $pdo->prepare(
            "UPDATE person
            SET first_name = :first_name, last_name = :last_name, birthdate = :birthdate, genre = :genre
            WHERE id_person = :id"
        );

        $detailQry->bindValue(':id', $id);
        $detailQry->bindValue(':first_name', $first_name);
        $detailQry->bindValue(':last_name', $last_name);
        $detailQry->bindValue(':birthdate', $birthdate);
        $detailQry->bindValue(':genre', $genre);

        $detailQry->execute();

        if ($this->checkIfActor($id) != $isActor) { // SI SON ANCIEN STATUT D'ACTEUR (true/false) EST DIFFERENT DU NOUVEAU DONNÉ PAR LE FOM :
            if ($isActor === true) {
                $isActorQry = $pdo->prepare(
                    "INSERT INTO actor (id_person)
                    VALUES (:id)"
                );

                $isActorQry->execute(["id" => $id]);
            } else {
                $isActorQry = $pdo->prepare(
                    "DELETE FROM actor
                    WHERE id_person = (:id)"
                );

                $isActorQry->execute(["id" => $id]);
            }
        }

        if ($this->checkIfDirector($id) != $isDirector) { // SI SON ANCIEN STATUT DE DIRECTOR (true/false) EST DIFFERENT DU NOUVEAU DONNÉ PAR LE FOM :
            if ($isDirector === true) {

                $isDirectorQry = $pdo->prepare(
                    "INSERT INTO director (id_person)
                    VALUES (:id)"
                );

                $isDirectorQry->execute(["id" => $id]);
            } else {
                $isDirectorQry = $pdo->prepare(
                    "DELETE FROM director
                    WHERE id_person = (:id)"
                );

                $isDirectorQry->execute(["id" => $id]);
            }
        }
    }

    public function updatePortrait($id, $portrait)
    {
        $pdo = Connect::dbConnect();

        $portraitQuery = $pdo->prepare(
            "UPDATE person
            SET portrait = :portrait
            WHERE id_person = :id"
        );

        $portraitQuery->bindValue(':id', $id);
        $portraitQuery->bindValue(':portrait', $portrait);

        $portraitQuery->execute();
    }

    public function checkIfActor($id)
    {
        $pdo = Connect::dbConnect();

        $checkActorQuery = $pdo->prepare(
            "SELECT *
            FROM person
            INNER JOIN actor ON person.id_person = actor.id_person
            WHERE person.id_person = :id"
        );

        $checkActorQuery->execute(["id" => $id]);
        $isActor = $checkActorQuery->fetch();

        if (!empty($isActor)) {
            $result = true;
        } else {
            $result = false;
        }

        return $result;
    }

    public function checkIfDirector($id)
    {
        $pdo = Connect::dbConnect();

        $checkDirectorQuery = $pdo->prepare(
            "SELECT *
            FROM person
            INNER JOIN director ON person.id_person = director.id_person
            WHERE person.id_person = :id"
        );

        $checkDirectorQuery->execute(["id" => $id]);
        $isDirector = $checkDirectorQuery->fetch();

        if (!empty($isDirector)) {
            $result = true;
        } else {
            $result = false;
        }

        return $result;
    }

    public function deletePerson($id)
    {
        if ($this->checkIfPersonExist($id) === true) {
            $pdo = Connect::dbConnect();

            $checkDirectorQuery = $pdo->prepare(
                "DELETE FROM person
                WHERE id_person = :id"
            );

            $checkDirectorQuery->execute(["id" => $id]);
        }
    }

    public function checkIfPersonExist($id)
    {
        $pdo = Connect::dbConnect();

        $checkDirectorQuery = $pdo->prepare(
            "SELECT *
            FROM person
            WHERE id_person = :id"
        );

        $checkDirectorQuery->execute(["id" => $id]);
        $personExist = $checkDirectorQuery->fetch();

        if (!empty($personExist)) {
            $result = true;
        } else {
            $result = false;
        }

        return $result;
    }
}
