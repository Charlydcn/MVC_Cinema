<?php

namespace Controller;
use Model\Connect;

class CinemaController {
    public function listMovies() {
        $pdo = Connect::dbConnect();

        $sql = $pdo->query(
            "SELECT title, release_date
            FROM movie"
        );

        require "view/movies.php";
    }
}

?>