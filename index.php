<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinéma</title>
    <style>

        * {
            font-family:arial;
        }

    </style>
</head>
<body>
    
<h1>CINEMA</h1>

    <?php
    
        spl_autoload_register(function ($class_name) {
            include $class_name . ".php";
        });

    // ***************************************************** DIRECTOR *****************************************************

        $timBurton = new Director("Tim", "Burton", "Male", "1958/08/25");
        $samRaimi = new Director("Sam", "Raimi", "Male", "1959/10/23");        
        $samMendes = new Director("Sam", "Mendes", "Male", "1965/08/01");

    // ***************************************************** ROLE *****************************************************

        //***** Batman *****/
        $batman = new Role("Batman");
        $vickiVale = new Role("Vicki Vale");
        $joker = new Role("Joker");
        $carlGrissom = new Role("Carl Grissom");
        $alfredPennyworth = new Role("Alfred Pennyworth");

        //***** Spiderman *****/
        $spiderMan = new Role("Spider-Man");
        $normanOsborn = new Role("Norman Osborn");
        $maryJane = new Role("Mary Jane");
        $harryOsborn = new Role("Harry Osborn");
        $auntMay = new Role("Aunt May");

        //***** Skyfall *****/
        $jamesBond = new Role("James Bond");
        $m = new Role("M");
        $raoulSilva = new Role("Raoul Silva");
        $garrethMallory = new Role("Garreth Mallory");
        $eveMoneypenny = new Role("Eve Moneypenny");

    // ***************************************************** ACTOR *****************************************************
        
        //***** Batman *****/
        $michaelKeaton = new Actor("Michael", "Keaton", "Male", "1951/09/05", $batman);
        $kimbaSinger = new Actor("Kim", "Basinger", "Female", "1953/12/08", $vickiVale);
        $jackNicholson = new Actor("Jack", "Nicholson", "Male", "1937/04/22", $joker);
        $jackPalance = new Actor("Jack", "Palance", "Male", "1919/02/18", $carlGrissom);
        $michaelGough = new Actor("Michael", "Gough", "Male", "1916/12/23", $alfredPennyworth);
        
        //***** Spider-man *****/
        $tobeyMaguire = new Actor("Tobey", "Maguire", "Male", "1975/06/27", $spiderMan);
        $willemDafoe = new Actor("Willem", "Dafoe", "Male", "1955/07/22", $normanOsborn);
        $kirstenDunst = new Actor("Kirsten", "Dunst", "Female", "1982/04/30", $maryJane);
        $jamesFranco = new Actor("James", "Franco", "Male", "1978/04/19", $harryOsborn);
        $rosemaryHarris = new Actor("Rosemary", "Harris", "Female", "1927/09/19", $auntMay);
        
        //***** Skyfall *****/
        $danielCraig = new Actor("Daniel", "Craig", "Male", "1968/03/02", $jamesBond);
        $judiDench = new Actor("Judi", "Dench", "Female", "1934/12/09", $m);
        $javierBarden = new Actor("Javier", "Bardem", "Male", "1969/03/01", $raoulSilva);
        $ralphFiennes = new Actor("Ralph", "Fiennes", "Male", "1962/12/22", $garrethMallory);
        $naomiesHarris = new Actor("Naomie", "Harris", "Female", "1976/09/06", $eveMoneypenny);

    // ***************************************************** MOVIE *****************************************************
    // ******************************************* Batman *******************************************

        $batman = new Movie
        (
        "Batman",
        "Action",
        "1989/09/13",
        125,
        $timBurton,
        [
            $michaelKeaton->$batman,
            $kimBasinger->$vickiVale,
            $jackNicholson->$joker,
            $jackPalance->$carlGrissom,
            $michaelGough->$alfredPennyworth
        ],
        "Le célèbre et impitoyable justicier, Batman, est de retour. Plus beau, plus fort et plus dépoussiéré que jamais, il s'apprête à nettoyer Gotham City et à
        affronter le terrible Joker..."
        );

        // echo $batman->getTitle() . "<br>";
        // echo $batman->getMovieGenre() . "<br>";
        // echo $batman->getReleaseDate() . "<br>";
        // echo $batman->getDuration() . "<br>";
        // echo $batman->getDirector() . "<br>";
        // echo $batman->getCasting() . "<br>";
        // echo $batman->getSynopsis() . "<br>";

    // ******************************************* Spider-man ***************************************

        $spiderman = new Movie
        (
        "Spider-man",
        "Fantastique",
        "2002/06/12",
        121,
        $samRaimi,
        [
            $tobeyMaguire->$spiderMan,
            $willemDafoe->$normanOsborn,
            $kirstenDunst->$maryJane,
            $jamesFranco->$harryOsborn,
            $rosemaryHarris->$auntMay
        ],
        "Après avoir été piqué par une araignée mutante, le collégien timoré Peter Parker subit une étrange transformation génétique. Il acquiert alors d'étonnantes facultés,
        comme de pouvoir s'accrocher aux surfaces des murs ou fabriquer des fils adhésifs qui lui permettent de se balancer d'un immeuble à l'autre..."
        );

        // echo $spiderman->getTitle() . "<br>";
        // echo $spiderman->getMovieGenre() . "<br>";
        // echo $spiderman->getReleaseDate() . "<br>";
        // echo $spiderman->getDuration() . "<br>";
        // echo $spiderman->getDirector() . "<br>";
        // echo $spiderman->getCasting() . "<br>";
        // echo $spiderman->getSynopsis() . "<br>";


    // ******************************************* Skyfall ******************************************

        $skyfall = new Movie
        (
        "Skyfall",
        "Espionnage",
        "2012/10/26",
        143,
        $samMendes,
        [
            $danielCraig->$jamesBond,
            $judiDench->$m,
            $javierBarden->$raoulSilva,
            $ralphFiennes->$garrethMallory,
            $naomiesHarris->$eveMoneypenny
        ],
        "Lorsque la dernière mission de Bond tourne mal, plusieurs agents infiltrés se retrouvent exposés dans le monde entier, Le MI6 est attaqué, et M est obligée
        de relocaliser l'Agence..."
        );

        // echo $skyfall->getTitle() . "<br>";
        // echo $skyfall->getMovieGenre() . "<br>";
        // echo $skyfall->getReleaseDate() . "<br>";
        // echo $skyfall->getDuration() . "<br>";
        // echo $skyfall->getDirector() . "<br>";
        // echo $skyfall->getCasting() . "<br>";
        // echo $skyfall->getSynopsis() . "<br>";


    
    
    ?>

</body>
</html>