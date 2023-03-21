<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinéma</title>
    <style>
        * {
            font-family: arial;
        }
    </style>
</head>

<body>

    <h1>CINEMA</h1>

    <?php

    spl_autoload_register(function ($class_name) {
        include $class_name . ".php";
    });

    $action = new MovieGenre("Action");
    $fantasy = new MovieGenre("Fantasy");
    $spy = new MovieGenre("Spy");

    // **************************************************** BATMAN ****************************************************
    
    // ************************** DIRECTOR **********************
    
    $timBurton = new Director("Tim", "Burton", "Male", "1958/08/25");

    // ************************** ROLES *************************
    
    $batman = new Role("Batman");
    $vickiVale = new Role("Vicki Vale");
    $joker = new Role("Joker");
    $carlGrissom = new Role("Carl Grissom");
    $alfredPennyworth = new Role("Alfred Pennyworth");

    // ************************** ACTORS ************************
    
    $michealKeaton = new Actor("Michael", "Keaton", "Male", "1951/09/05", $batman);
    $kimBasinger = new Actor("Kim", "Basinger", "Female", "1953/12/08", $vickiVale);
    $jackNicholson = new Actor("Jack", "Nicholson", "Male", "1937/04/22", $joker);
    $jackPalance = new Actor("Jack", "Palance", "Male", "1919/02/18", $carlGrissom);
    $michaelGough = new Actor("Michael", "Gough", "Male", "1916/12/23", $alfredPennyworth);

    // ************************** MOVIE ************************
    
    $movieBatman = new Movie
    (
        "Batman",
        $action,
        "1989/09/13",
        125,
        $timBurton,
        "Le célèbre et impitoyable justicier, Batman, est de retour. Plus beau, plus fort et plus dépoussiéré que jamais, il s'apprête à nettoyer Gotham City et à
        affronter le terrible Joker..."
    );

    // ************************** CASTINGS **********************
    
    $batmanCasting = new Casting($batman, $michealKeaton, $movieBatman);
    $vickiValeCasting = new Casting($vickiVale, $kimBasinger, $movieBatman);
    $jokerCasting = new Casting($joker, $jackNicholson, $movieBatman);
    $carlGrissomCasting = new Casting($carlGrissom, $jackPalance, $movieBatman);
    $alfredPennyworthCasting = new Casting($alfredPennyworth, $michaelGough, $movieBatman);

    // ************************** ECHO **************************
    
    echo $movieBatman->getInfos();

    // **************************************************** SPIDERMAN ****************************************************
    
    // ************************** DIRECTOR **********************
    
    $samRaimi = new Director("Sam", "Raimi", "Male", "1959/10/23");

    // ************************** ROLES *************************
    
    $spiderMan = new Role("Spider-Man");
    $normanOsborn = new Role("Norman Osborn");
    $maryJane = new Role("Mary Jane");
    $harryOsborn = new Role("Harry Osborn");
    $auntMay = new Role("Aunt May");

    // ************************** ACTORS ************************
    
    $tobeyMaguire = new Actor("Tobey", "Maguire", "Male", "1975/06/27", $spiderMan);
    $willemDafoe = new Actor("Willem", "Dafoe", "Male", "1955/07/22", $normanOsborn);
    $kirstenDunst = new Actor("Kirsten", "Dunst", "Female", "1982/04/30", $maryJane);
    $jamesFranco = new Actor("James", "Franco", "Male", "1978/04/19", $harryOsborn);
    $rosemaryHarris = new Actor("Rosemary", "Harris", "Female", "1927/09/19", $auntMay);

    // ************************** MOVIE ************************
    
    $movieSpiderman = new Movie
    (
        "Spider-man",
        $fantasy,
        "2002/06/12",
        121,
        $samRaimi,
        "Après avoir été piqué par une araignée mutante, le collégien timoré Peter Parker subit une étrange transformation génétique. Il acquiert alors d'étonnantes facultés,
        comme de pouvoir s'accrocher aux surfaces des murs ou fabriquer des fils adhésifs qui lui permettent de se balancer d'un immeuble à l'autre..."
    );

    // ************************** CASTINGS **********************
    
    $spiderManCasting = new Casting($spiderMan, $tobeyMaguire, $movieSpiderman);
    $normanOsbornCasting = new Casting($normanOsborn, $willemDafoe, $movieSpiderman);
    $maryJaneCasting = new Casting($maryJane, $kirstenDunst, $movieSpiderman);
    $harryOsbornCasting = new Casting($harryOsborn, $jamesFranco, $movieSpiderman);
    $auntMayCasting = new Casting($auntMay, $rosemaryHarris, $movieSpiderman);

    // ************************** ECHO **************************
    
    echo $movieSpiderman->getInfos();

    // **************************************************** SKYFALL ****************************************************
    
    // ************************** DIRECTOR **********************
    
    $samMendes = new Director("Sam", "Mendes", "Male", "1965/08/01");

    // ************************** ROLES *************************
    
    $jamesBond = new Role("James Bond");
    $m = new Role("M");
    $raoulSilva = new Role("Raoul Silva");
    $garrethMallory = new Role("Garreth Mallory");
    $eveMoneypenny = new Role("Eve Moneypenny");

    // ************************** ACTORS ************************
    
    $danielCraig = new Actor("Daniel", "Craig", "Male", "1968/03/02", $jamesBond);
    $judiDench = new Actor("Judi", "Dench", "Female", "1934/12/09", $m);
    $javierBarden = new Actor("Javier", "Bardem", "Male", "1969/03/01", $raoulSilva);
    $ralphFiennes = new Actor("Ralph", "Fiennes", "Male", "1962/12/22", $garrethMallory);
    $naomiesHarris = new Actor("Naomie", "Harris", "Female", "1976/09/06", $eveMoneypenny);

    // ************************** MOVIE ************************
    
    $skyfall = new Movie
    (
        "Skyfall",
        $spy,
        "2012/10/26",
        143,
        $samMendes,
        "Lorsque la dernière mission de Bond tourne mal, plusieurs agents infiltrés se retrouvent exposés dans le monde entier, Le MI6 est attaqué, et M est obligée
        de relocaliser l'Agence..."
    );

    // ************************** CASTINGS **********************
    
    $jamesBondCasting = new Casting($jamesBond, $danielCraig, $skyfall);
    $mCasting = new Casting($m, $judiDench, $skyfall);
    $raoulSilvaCasting = new Casting($raoulSilva, $javierBarden, $skyfall);
    $garrethMalloryCasting = new Casting($garrethMallory, $ralphFiennes, $skyfall);
    $eveMoneypennyCasting = new Casting($eveMoneypenny, $naomiesHarris, $skyfall);

    // ************************** ECHO **************************
    
    echo $skyfall->getInfos();


    // **************************************************** TESTMOVIE123 ****************************************************
    
    // ************************** DIRECTOR **********************
    
    $testDirector = new Director("John", "Doe", "Male", "1966/10/14");

    // ************************** ROLES *************************
    
    $testRole1 = new Role("test role 1");
    $testRole2 = new Role("test role 2");
    $testRole3 = new Role("test role 3");
    $testRole4 = new Role("test role 4");
    $testRole5 = new Role("test role 5");

    // ************************** ACTORS ************************
    
    $testActor1 = new Actor("actor 1", "test", "Male", "1968/03/02", $testRole1);
    $testActor2 = new Actor("actor 2", "test", "Female", "1934/12/09", $testRole2);
    $testActor3 = new Actor("actor 3", "test", "Male", "1969/03/01", $testRole3);
    $testActor4 = new Actor("actor 4", "test", "Male", "1962/12/22", $testRole4);
    $testActor5 = new Actor("actor 5", "test", "Female", "1976/09/06", $testRole5);

    // ************************** MOVIE ************************
    
    $testMovie1 = new Movie
    (
        "Test movie 1",
        $spy,
        "2002/10/02",
        250,
        $samMendes,
        "Synopsis test lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum"
    );

    // ************************** CASTINGS **********************
    
    $testRole1Casting = new Casting($testRole1, $testActor1, $testMovie1);
    $testRole2Casting = new Casting($testRole2, $testActor2, $testMovie1);
    $testRole3Casting = new Casting($testRole3, $testActor3, $testMovie1);
    $testRole4Casting = new Casting($testRole4, $testActor4, $testMovie1);
    $testRole5Casting = new Casting($testRole5, $testActor5, $testMovie1);

    // ************************** ECHO **************************
    
    echo $testMovie1->getInfos();

    // **************************************************** TEST ****************************************************
    
    $valKilmer = new Actor("Val", "Kilmer", "Male", "1959/12/31", $batman);
    $georgeClooney = new Actor("George", "Clooney", "Male", "1961/05/06", $batman);

    echo "<h2>TESTS</h2>";

    echo "<strong>Actors who played the role " . $batman . " :</strong>" . $batman->getActors();

    echo " <strong>Movies directed by " . $samMendes . " :</strong>" . $samMendes->getMovies();

    echo "<strong>Movies starring " . $tobeyMaguire . " : " . $tobeyMaguire->getMovies();

    echo $spy->getNbMovie();

    ?>

</body>

</html>