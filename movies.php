<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="/assets/CSS/style.css">

    <!-- *************PHP REQUIRE************* -->
    <?php require 'assets/classes/Person.php' ?>
    <?php require 'assets/classes/Director.php' ?>
    <?php require 'assets/classes/Role.php' ?>
    <?php require 'assets/classes/Actor.php' ?>
    <?php require 'assets/classes/Movie.php' ?>
    <?php require 'assets/classes/Casting.php' ?>
    <?php require 'assets/classes/MovieGenre.php' ?>
    <?php require 'assets/classes/indexold.php'?>
    <style> <?php include 'assets/CSS/style.css'; ?> </style>
    <!-- ************************************* -->
    
</head>

<body>
    
    <header>

        <h1>POO CINEMA</h1>

        <nav>
            <ul>
                <a href="index.php">
                    <li>Accueil</li>
                </a>

                <a href="movies.php">
                    <li>Films</li>
                </a>

                <a href="actors.php">
                    <li>Acteurs</li>
                </a>

                <a href="directors.php">
                    <li>Producteurs</li>
                </a>

                <a href="roles.php">
                    <li>Rôles</li>
                </a>
            </ul>
        </nav>

     </header>

    <main>
        
        <div id="movie_cards">

            <article class="movie_card">
                <figure>
                    <a href="http://localhost/Charly/Cinema/assets/img/batman1989-cover.jpg" target="_blank">
                        <img src="assets/img/batman1989-cover.jpg" alt="movie cover batman 1989">
                    </a>
                </figure>
            
            <?php echo $movieBatman->getInfos()  ?>

            </article>

            <article class="movie_card">
                <figure>
                    <a href="http://localhost/Charly/Cinema/assets/img/spiderman2002-cover.jpg" target="_blank">
                        <img src="assets/img/spiderman2002-cover.jpg" alt="movie cover batman 1989">
                    </a>
                </figure>

                <?php echo $movieSpiderman->getInfos()  ?>

            </article>

            <article class="movie_card">
                <figure>
                    <a href="http://localhost/Charly/Cinema/assets/img/skyfall2012-cover.jpg" target="_blank">
                        <img src="assets/img/skyfall2012-cover.jpg" alt="movie cover batman 1989">
                    </a>
                </figure>

                <?php echo $skyfall->getInfos()  ?>

            </article>

            <article class="movie_card">
                <figure>
                    <a href="http://localhost/Charly/Cinema/assets/img/batman1989-cover.jpg" target="_blank">
                        <img src="assets/img/batman1989-cover.jpg" alt="movie cover batman 1989">
                    </a>
                </figure>

                <?php echo $testMovie1->getInfos()  ?>

            </article>

            <article class="movie_card">
                <figure>
                    <a href="http://localhost/Charly/Cinema/assets/img/batman1989-cover.jpg" target="_blank">
                        <img src="assets/img/batman1989-cover.jpg" alt="movie cover batman 1989">
                    </a>
                </figure>

                <?php echo $pulpFiction->getInfos()  ?>

            </article>

            <article class="movie_card">
                <figure>
                    <a href="http://localhost/Charly/Cinema/assets/img/batman1989-cover.jpg" target="_blank">
                        <img src="assets/img/batman1989-cover.jpg" alt="movie cover batman 1989">
                    </a>
                </figure>

                <?php echo $forrestGumpMovie->getInfos()  ?>

            </article>

            <article class="movie_card">
                <figure>
                    <a href="http://localhost/Charly/Cinema/assets/img/batman1989-cover.jpg" target="_blank">
                        <img src="assets/img/batman1989-cover.jpg" alt="movie cover batman 1989">
                    </a>
                </figure>

                <?php echo $theShawshankRedemption->getInfos()  ?>

            </article>
    
        </div>

    </main>

    <footer>

    </footer>

</body>

</html>