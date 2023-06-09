<?php

namespace Controller;

session_start();

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
            "SELECT movie.id_movie, title, YEAR(release_date) AS 'release_date', SEC_TO_TIME(length*60) AS 'length', first_name, last_name, synopsis, rating, poster, GROUP_CONCAT(genre_name) AS 'genres', movie.id_director
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

        $getGenres = $pdo->query(
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

    public function updatePerson($id)
    {
        // FORM SUBMIT TRAITEMENT ****************************************************************************************
        // ***************************************************************************************************************

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
                    move_uploaded_file($imgTmpName, 'public/img/portraits/' . $portrait);
                }
            }
            //****************************************************************

            if ($isActor === null) {
                $isActor = false;
            }

            if ($isDirector === null) {
                $isDirector = false;
            }

            // *********************************************************************************************************
            // *********************************************************************************************************

            if ($first_name && $last_name && $birthdate && $genre && is_bool($isActor) && is_bool($isDirector)) { // SI LES FILTERS SONT VALIDES..

                if ($isActor === true || $isDirector === true) { // SI LA PERSONNE EST ACTEUR OU REALISATEUR.. (pas aucun)

                    // UPDATE PERSON DETAIL ************************************************************************************

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

                    // *********************************************************************************************************
                    // UPDATE PERSON STATUT (acteur/réalisateur/both) **********************************************************

                    if ($this->checkIfActor($id) != $isActor) { // SI SON ANCIEN STATUT D'ACTEUR (true/false) EST DIFFERENT DU NOUVEAU DONNÉ PAR LE FOM :
                        if ($isActor === true) {                // SI LA NOUVELLE CASE isActor EST COCHEE..
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
                        if ($isDirector === true) {                   // SI LA NOUVELLE CASE isActor EST COCHEE..

                            $isDirectorQry = $pdo->prepare(
                                "INSERT INTO director (id_person)
                                VALUES (:id)"
                            );

                            $isDirectorQry->execute(["id" => $id]);
                        } else {                                      // SINON..
                            $isDirectorQry = $pdo->prepare(
                                "DELETE FROM director
                                WHERE id_person = (:id)"
                            );

                            $isDirectorQry->execute(["id" => $id]);
                        }
                    }

                    // *********************************************************************************************************
                    // UPDATE PERSON PORTRAIT **********************************************************************************

                    $getOldPortraitQuery = $pdo->prepare(
                        "SELECT portrait
                        FROM person
                        WHERE id_person = :id"
                    );

                    $getOldPortraitQuery->execute(["id" => $id]);
                    $oldPortrait = $getOldPortraitQuery->fetch();

                    if (isset($portrait) && $portrait != null && $portrait != $oldPortrait) { // SI LE PORTRAIT EST SET ET QU'IL N'EST PAS null ET QU'IL N'EST PAS LE MEME QU'AVANT
                        $portraitQuery = $pdo->prepare(
                            "UPDATE person
                            SET portrait = :portrait
                            WHERE id_person = :id"
                        );

                        $portraitQuery->bindValue(':id', $id);
                        $portraitQuery->bindValue(':portrait', $portrait);

                        $portraitQuery->execute();
                    }

                    // *********************************************************************************************************
                    // *********************************************************************************************************

                    $_SESSION['message'] = "<div class='alert alert-success' role='alert'>Person successfully modified</div>";
                } else {
                    $_SESSION['message'] = "<div class='alert alert-warning' role='alert'>Person has to be either an actor, or a director</div>";
                }
            } else {

                $_SESSION['message'] = "<div class='alert alert-warning' role='alert'>Error</div>";
            }
        }

        Header("Location:index.php?action=edit_person&id=$id");
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

            $getPortraitQuery = $pdo->prepare(
                "SELECT portrait
                FROM person
                WHERE id_person = :id"
            );

            $getPortraitQuery->execute(["id" => $id]);
            $portrait = $getPortraitQuery->fetch();

            if ($portrait != "missing.png") {
                unlink("public/img/portraits/$portrait[0]");
            }

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

        $checkIfExistQuery = $pdo->prepare(
            "SELECT *
            FROM person
            WHERE id_person = :id"
        );

        $checkIfExistQuery->execute(["id" => $id]);
        $personExist = $checkIfExistQuery->fetch();

        if (!empty($personExist)) {
            $result = true;
        } else {
            $result = false;
        }

        return $result;
    }

    public function createPersonDashboard()
    {
        if (isset($_POST['submit'])) {
            $first_name = filter_input(INPUT_POST, "first_name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $last_name = filter_input(INPUT_POST, "last_name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $birthdate = filter_input(INPUT_POST, "birthdate", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $genre = filter_input(INPUT_POST, "genre", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
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
                    move_uploaded_file($imgTmpName, 'public/img/portraits/' . $portrait);
                } else {
                    $portrait = "missing.png";
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

                    // ************************************************************************************************
                    // QUERY CREATE ***********************************************************************************

                    $pdo = Connect::dbConnect();

                    $createPersonQuery = $pdo->prepare(
                        "INSERT INTO person (first_name, last_name, birthdate, genre, portrait)
                        VALUES (:first_name, :last_name, :birthdate, :genre, :portrait)"
                    );

                    $createPersonQuery->bindValue(':first_name', $first_name);
                    $createPersonQuery->bindValue(':last_name', $last_name);
                    $createPersonQuery->bindValue(':birthdate', $birthdate);
                    $createPersonQuery->bindValue(':genre', $genre);
                    $createPersonQuery->bindValue(':portrait', $portrait);

                    $createPersonQuery->execute();

                    $getLastId = $pdo->prepare(
                        "SELECT LAST_INSERT_ID()"
                    );

                    $getLastId->execute();
                    $lastId = $getLastId->fetch();
                    $id = $lastId[0];

                    // ************************************************************************************************
                    // QUERY ADD TO ACTOR/DIRECTOR ********************************************************************

                    if ($isActor === true) {
                        $addActorQuery = $pdo->prepare(
                            "INSERT INTO actor (id_person)
                            VALUES (:id)"
                        );

                        $addActorQuery->execute(["id" => $id]);
                    }

                    if ($isDirector === true) {
                        $addDirectorQuery = $pdo->prepare(
                            "INSERT INTO director (id_person)
                            VALUES (:id)"
                        );

                        $addDirectorQuery->execute(["id" => $id]);
                    }

                    // ************************************************************************************************
                    // ************************************************************************************************

                    $_SESSION['message'] = "<div class='alert alert-success' role='alert'>Person successfully created</div>";

                    require "view/create_person.php";
                } else {
                    $_SESSION['message'] = "<div class='alert alert-warning' role='alert'>Person has to be either an actor, or a director</div>";

                    require "view/create_person.php";
                }
            } else {

                $_SESSION['message'] = "<div class='alert alert-warning' role='alert'>Error</div>";

                require "view/create_person.php";
            }
        } else {

            require "view/create_person.php";
        }
    }

    public function createMovie()
    {
        if (isset($_POST['submit'])) {
            $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $release_date = filter_input(INPUT_POST, "release_date", FILTER_SANITIZE_SPECIAL_CHARS);
            $length = filter_input(INPUT_POST, "length", FILTER_VALIDATE_INT);
            $synopsis = filter_input(INPUT_POST, "synopsis");
            $rating = filter_input(INPUT_POST, "rating", FILTER_VALIDATE_FLOAT);
            $director = filter_input(INPUT_POST, "directors", FILTER_VALIDATE_INT);
            $genres = filter_input_array(INPUT_POST, [
                'genres' => [
                    'filter' => FILTER_VALIDATE_INT,
                    'flags'  => FILTER_REQUIRE_ARRAY,
                ]
            ]);

            $nbGenres = count($genres['genres']);

            //************************ IMAGE *********************************

            if (isset($_FILES['poster'])) {
                $imgTmpName = $_FILES['poster']['tmp_name'];
                $imgName = $_FILES['poster']['name'];
                $imgSize = $_FILES['poster']['size'];
                $imgError = $_FILES['poster']['error'];

                $tabExtension = explode('.', $imgName);
                $extension = strtolower(end($tabExtension));

                //Tableau des extensions que l'on accepte
                $extensions = ['jpg', 'png', 'jpeg', 'gif'];
                $maxSize = 5000000;

                if (in_array($extension, $extensions) && $imgSize <= $maxSize && $imgError == 0) {
                    $uniqueName = uniqid('', true); // uniqid génère un ID random (exemple 5f586bf96dcd38.73540086)
                    $poster = $uniqueName . '.' . $extension;
                    move_uploaded_file($imgTmpName, 'public/img/posters/' . $poster);
                } else {
                    $poster = "missing.png";
                }
            }

            if ($title && $release_date && $length && $synopsis && $rating && $director && ($nbGenres <= 3)) {

                // ************************************************************************************************
                // QUERY CREATE ***********************************************************************************

                $pdo = Connect::dbConnect();

                $createMovieQuery = $pdo->prepare(
                    "INSERT INTO movie (title, release_date, LENGTH, synopsis, rating, poster, id_director)
                    VALUES (:title, :release_date, :length, :synopsis, :rating, :poster, :id_director)"
                );

                $createMovieQuery->bindValue(':title', $title);
                $createMovieQuery->bindValue(':release_date', $release_date);
                $createMovieQuery->bindValue(':length', $length);
                $createMovieQuery->bindValue(':synopsis', $synopsis);
                $createMovieQuery->bindValue(':rating', $rating);
                $createMovieQuery->bindValue(':poster', $poster);
                $createMovieQuery->bindValue(':id_director', $director);

                $createMovieQuery->execute();

                foreach ($genres['genres'] as $genre) {
                    $addGenreQuery = $pdo->prepare(
                        "INSERT INTO set_movie_genre
                        VALUES (LAST_INSERT_ID(), :genre)"
                    );

                    $addGenreQuery->execute(["genre" => $genre]);
                }

                // ************************************************************************************************
                // REDIRECT ***********************************************************************************

                $getLastId = $pdo->prepare(
                    "SELECT LAST_INSERT_ID()"
                );

                $getLastId->execute();
                $lastId = $getLastId->fetch();
                $id = $lastId[0];

                Header("Location:index.php?action=casting&id=$id");

                $_SESSION['message'] = "<div class='alert alert-success' role='alert'>Movie successfully created</div>";
            } else {
                $_SESSION['message'] = "<div class='alert alert-warning' role='alert'>Error, incorrect values</div>";
            }
        }

        $genres = $this->getGenres();
        $directors = $this->getDirectors();

        require 'view/create_movie.php';
    }

    public function getGenres()
    {
        $pdo = Connect::dbConnect();

        $getGenres = $pdo->query(
            "SELECT *
            FROM movie_genre"
        );

        $genres = $getGenres->fetchAll();

        return $genres;
    }

    public function getDirectors()
    {

        $pdo = Connect::dbConnect();

        $getDirectors = $pdo->query(
            "SELECT *
            FROM person
            INNER JOIN director ON person.id_person = director.id_person"
        );

        $directors = $getDirectors->fetchAll();

        return $directors;
    }

    public function getMovies()
    {

        $pdo = Connect::dbConnect();

        $getMovies = $pdo->query(
            "SELECT *
            FROM movie"
        );

        $movies = $getMovies->fetchAll();

        return $movies;
    }

    public function getMovieById($id)
    {

        $pdo = Connect::dbConnect();

        $getMovie = $pdo->prepare(
            "SELECT *
            FROM movie
            WHERE id_movie = :id"
        );

        $getMovie->execute(['id' => $id]);

        $movie = $getMovie->fetch();

        return $movie;
    }

    public function getActors()
    {

        $pdo = Connect::dbConnect();

        $getActors = $pdo->query(
            "SELECT *
            FROM person
            INNER JOIN actor ON person.id_person = actor.id_person"
        );

        $actors = $getActors->fetchAll();

        return $actors;
    }

    public function getRoles()
    {

        $pdo = Connect::dbConnect();

        $getRoles = $pdo->query(
            "SELECT *
            FROM role"
        );

        $roles = $getRoles->fetchAll();

        return $roles;
    }

    public function getCastings($id)
    {

        $pdo = Connect::dbConnect();

        $createCasting = $pdo->prepare(
            "SELECT id_casting, title AS 'movie', first_name, last_name, role_name AS 'role'
            FROM person
            INNER JOIN actor ON person.id_person = actor.id_person
            INNER JOIN casting ON actor.id_actor = casting.id_actor
            INNER JOIN movie ON casting.id_movie = movie.id_movie
            INNER JOIN role ON casting.id_role = role.id_role
            WHERE movie.id_movie = :id"
        );

        $createCasting->execute(['id' => $id]);

        $castings = $createCasting->fetchAll();

        return $castings;
    }

    public function createCasting($id)
    {

        if (isset($_POST['submit'])) {
            $actor = filter_input(INPUT_POST, "actors", FILTER_VALIDATE_INT);
            $role = filter_input(INPUT_POST, "roles", FILTER_VALIDATE_INT);

            if ($actor && $role) {
                $pdo = Connect::dbConnect();

                $createCasting = $pdo->prepare(
                    "INSERT INTO casting (id_role, id_actor, id_movie)
                    VALUES (:role, :actor, :movie)"
                );

                $createCasting->bindValue(':role', $role);
                $createCasting->bindValue(':actor', $actor);
                $createCasting->bindValue(':movie', $id);

                $createCasting->execute();

                $_SESSION['message'] = "<div class='alert alert-success' role='alert'>Casting successfully created</div>";
            } else {
                $_SESSION['message'] = "<div class='alert alert-warning' role='alert'>Incorrect values</div>";
            }

            Header("Location:index.php?action=casting&id=$id");
        }

        $movie = $this->getMovieById($id);
        $actors = $this->getActors();
        $roles = $this->getRoles();
        $castings = $this->getCastings($id);

        require 'view/casting.php';
    }

    public function deleteCasting($id)
    {

        $pdo = Connect::dbConnect();

        $findMovie = $pdo->prepare(
            "SELECT id_movie
            FROM casting
            WHERE id_casting = :id"
        );

        $findMovie->execute(['id' => $id]);

        $idMovie = $findMovie->fetch();

        $deleteCasting = $pdo->prepare(
            "DELETE FROM casting
            WHERE id_casting = :id"
        );

        $deleteCasting->execute(['id' => $id]);

        Header("Location:index.php?action=casting&id=$idMovie[0]");
    }

    public function deleteMovie($id)
    {
        $pdo = Connect::dbConnect();

        $getPosterQuery = $pdo->prepare(
            "SELECT poster
                FROM movie
                WHERE id_movie = :id"
        );

        $getPosterQuery->execute(["id" => $id]);
        $poster = $getPosterQuery->fetch();

        if ($poster != "missing.png") {
            unlink("public/img/posters/$poster[0]");
        }

        $deleteMovie = $pdo->prepare(
            "DELETE FROM movie
            WHERE id_movie = :id"
        );

        $deleteMovie->execute([":id" => $id]);

        $_SESSION['message'] = "<div class='alert alert-success' role='alert'>Movie deleted</div>";

        Header("Location:index.php?action=movies");
    }
}
