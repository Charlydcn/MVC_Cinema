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
            "SELECT *
            FROM movie"
        );

        require "view/movies.php";
    }

    // QUERY = PAS D'ELEMENT VARIABLE DANS LA REQUETE SQL (ex: $id)
    // PREPARE + EXECUTE = ELEMENT VARIABLE DANS LA REQUETE

    public function movieDetail($id)
    {
        $pdo = Connect::dbConnect();

        $sql = $pdo->prepare(
            "SELECT *
            FROM movie
            WHERE id_movie = :id"
        );

        $sql->execute(["id" => $id]);

        require "view/movie_detail.php";
    }

    public function movieCasting($id)
    {
        $pdo = Connect::dbConnect();

        $sql = $pdo->prepare(
            "SELECT first_name, last_name, role_name
            FROM person
            INNER JOIN actor ON person.id_person = actor.id_person
            INNER JOIN casting ON actor.id_actor = casting.id_actor
            INNER JOIN movie ON casting.id_movie = movie.id_movie
            INNER JOIN role ON casting.id_role = role.id_role
            WHERE movie.id_movie = :id"
        );

        $sql->execute(["id" => $id]);

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

        $sql = $pdo->prepare(
            "SELECT *
            FROM actor
            WHERE id_actor = :id"
        );

        $sql->execute(["id" => $id]);

        require "view/actor_detail.php";
    }

    public function actorMovies($id)
    {
        $pdo = Connect::dbConnect();

        $sql = $pdo->prepare(
            "SELECT title, release_date, role_name
            FROM movie
            INNER JOIN casting ON movie.id_movie = casting.id_movie
            INNER JOIN role ON casting.id_role = role.id_role
            INNER JOIN actor ON casting.id_actor = actor.id_actor
            WHERE actor.id_actor = :id
            ORDER BY release_date ASC"
        );

        $sql->execute(["id" => $id]);

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

        $sql = $pdo->prepare(
            "SELECT *
            FROM director
            WHERE id_director = :id"
        );

        $sql->execute(["id" => $id]);

        require "view/director_detail.php";
    }

    public function directorMovies($id)
    {
        $pdo = Connect::dbConnect();

        $sql = $pdo->prepare(
            "SELECT title, release_date 
            FROM movie
            INNER JOIN director ON movie.id_director = director.id_director
            WHERE movie.id_director = :id"
        );

        $sql->execute(["id" => $id]);

        require "view/director_detail.php";
    }

    // *********************************************************
    // GENRES **************************************************

    public function listGenres()
    {
        $pdo = Connect::dbConnect();

        $sql = $pdo->query(
            "SELECT movie_genre.genre_name, COUNT(title) AS 'count'
            FROM movie
            INNER JOIN set_movie_genre ON movie.id_movie = set_movie_genre.id_movie
            INNER JOIN movie_genre ON set_movie_genre.id_movie_genre = movie_genre.id_movie_genre
            GROUP BY movie_genre.genre_name
            ORDER BY COUNT(title) DESC"
        );

        require "view/genres.php";
    }

    public function genreDetail()
    {
    }
}
