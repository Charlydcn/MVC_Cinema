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

    <?php

    spl_autoload_register(function ($class_name) {
        include $class_name . ".php";
    });

    $action = new MovieGenre("Action");
    $fantasy = new MovieGenre("Fantasy");
    $spy = new MovieGenre("Spy");
    $sciFi = new MovieGenre("Science-Fiction");
    $drama = new MovieGenre("Drama");
    $crime = new MovieGenre("Crime");

    // ****************************************************************************************************************
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
    
    $michealKeaton = new Actor("Michael", "Keaton", "Male", "1951/09/05");
    $kimBasinger = new Actor("Kim", "Basinger", "Female", "1953/12/08");
    $jackNicholson = new Actor("Jack", "Nicholson", "Male", "1937/04/22");
    $jackPalance = new Actor("Jack", "Palance", "Male", "1919/02/18");
    $michaelGough = new Actor("Michael", "Gough", "Male", "1916/12/23");

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
    
    // echo $movieBatman->getInfos();
    








    


    // *******************************************************************************************************************
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
    
    $tobeyMaguire = new Actor("Tobey", "Maguire", "Male", "1975/06/27");
    $willemDafoe = new Actor("Willem", "Dafoe", "Male", "1955/07/22");
    $kirstenDunst = new Actor("Kirsten", "Dunst", "Female", "1982/04/30");
    $jamesFranco = new Actor("James", "Franco", "Male", "1978/04/19");
    $rosemaryHarris = new Actor("Rosemary", "Harris", "Female", "1927/09/19");

    // ************************** MOVIE ************************
    
    $movieSpiderman = new Movie
    (
        "Spiderman",
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
    
    // echo $movieSpiderman->getInfos();






    
    // *****************************************************************************************************************    
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
    
    $danielCraig = new Actor("Daniel", "Craig", "Male", "1968/03/02");
    $judiDench = new Actor("Judi", "Dench", "Female", "1934/12/09");
    $javierBarden = new Actor("Javier", "Bardem", "Male", "1969/03/01");
    $ralphFiennes = new Actor("Ralph", "Fiennes", "Male", "1962/12/22");
    $naomiesHarris = new Actor("Naomie", "Harris", "Female", "1976/09/06");

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
    
    // echo $skyfall->getInfos();
    










    // ********************************************************************************************************************** 
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
    
    $testActor1 = new Actor("actor 1", "test", "Male", "1968/03/02");
    $testActor2 = new Actor("actor 2", "test", "Female", "1934/12/09");
    $testActor3 = new Actor("actor 3", "test", "Male", "1969/03/01");
    $testActor4 = new Actor("actor 4", "test", "Male", "1962/12/22");
    $testActor5 = new Actor("actor 5", "test", "Female", "1976/09/06");

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
    
    $testRole1Casting = new Casting($testRole1, $tobeyMaguire, $testMovie1);
    $testRole2Casting = new Casting($batman, $testActor2, $testMovie1);
    $testRole3Casting = new Casting($testRole3, $testActor3, $testMovie1);
    $testRole4Casting = new Casting($testRole4, $testActor4, $testMovie1);
    $testRole5Casting = new Casting($testRole5, $testActor5, $testMovie1);

    // ************************** ECHO **************************
    
    // echo $testMovie1->getInfos();










    // ********************************************************************************************************************** 
    // **************************************************** INCEPTION *******************************************************

    // ************************** DIRECTOR **********************

    $christopherNolan = new Director("Christopher", "Nolan", "Male", "1970/07/30");

    // ************************** ROLES *************************

    $domCobb = new Role("Dom Cobb");
    $ariane = new Role("Ariane");
    $mal = new Role("Mal");
    $eames = new Role("Eames");
    $saïto = new Role("Saïto");

    // ************************** ACTORS ************************

    $leonardoDiCaprio = new Actor("Leonardo", "DiCaprio", "Male", "1974/11/11");
    $ellenPage = new Actor("Ellen", "Page", "Female", "1987/02/21");
    $marionCotillard = new Actor("Marion", "Cotillard", "Female", "1975/09/30");
    $tomHardy = new Actor("Tom", "Hardy", "Male", "1977/09/15");
    $kenWatanabe = new Actor("Ken", "Watanabe", "Male", "1959/10/21");

    // ************************** MOVIE ************************

    $movieInception = new Movie
    (
    "Inception",
    $sciFi,
    "2010/07/16",
    148,
    $christopherNolan,
    "Dom Cobb est un voleur expérimenté, le meilleur dans l'art dangereux de l'extraction, qui consiste à voler les secrets les plus intimes enfouis au plus profond du subconscient durant une phase de rêve, lorsque l'esprit est le plus vulnérable. Avec l'aide d'une équipe de spécialistes, il est devenu un acteur incontournable dans le monde de l'espionnage industriel."
    );

    // ************************** CASTINGS **********************

    $domCobbCasting = new Casting($domCobb, $leonardoDiCaprio, $movieInception);
    $arianeCasting = new Casting($ariane, $ellenPage, $movieInception);
    $malCasting = new Casting($mal, $marionCotillard, $movieInception);
    $eamesCasting = new Casting($eames, $tomHardy, $movieInception);
    $saïtoCasting = new Casting($saïto, $kenWatanabe, $movieInception);


    // ************************** ECHO **************************

    // echo $movieInception->getInfos();










    // ********************************************************************************************************************************* 
    // **************************************************** SHAWSHANK REDEMPTION *******************************************************

    // ************************** DIRECTOR **********************

    $frankDarabont = new Director("Frank", "Darabont", "Male", "1959/01/28");

    // ************************** ROLES *************************

    $andyDufresne = new Role("Andy Dufresne");
    $ellisBoydRedding = new Role("Ellis Boyd 'Red' Redding");
    $byronHadley = new Role("Byron Hadley");
    $samuelNorton = new Role("Samuel Norton");
    $heywood = new Role("Heywood");

    // ************************** ACTORS ************************

    $timRobbins = new Actor("Tim", "Robbins", "Male", "1958/10/16");
    $morganFreeman = new Actor("Morgan", "Freeman", "Male", "1937/06/01");
    $clancyBrown = new Actor("Clancy", "Brown", "Male", "1959/01/05");
    $bobGunton = new Actor("Bob", "Gunton", "Male", "1945/11/15");
    $williamSadler = new Actor("William", "Sadler", "Male", "1950/04/13");

    // ************************** MOVIE ************************

    $theShawshankRedemption = new Movie
    (
        "The Shawshank Redemption",
        $drama,
        "1994/09/10",
        142,
        $frankDarabont,
        "Andy Dufresne, a successful banker, is convicted of murdering his wife and her lover and is sentenced to life imprisonment at the Shawshank prison. He becomes friends with a fellow inmate, Ellis Boyd 'Red' Redding, and finds solace in his knowledge and companionship while being tormented by the guards and his fellow inmates."
    );

    // ************************** CASTINGS **********************

    $andyDufresneCasting = new Casting($andyDufresne, $timRobbins, $theShawshankRedemption);
    $ellisBoydReddingCasting = new Casting($ellisBoydRedding, $morganFreeman, $theShawshankRedemption);
    $byronHadleyCasting = new Casting($byronHadley, $clancyBrown, $theShawshankRedemption);
    $samuelNortonCasting = new Casting($samuelNorton, $bobGunton, $theShawshankRedemption);
    $heywoodCasting = new Casting($heywood, $williamSadler, $theShawshankRedemption);








    // ********************************************************************************************************************************* 
    // **************************************************** PULP FICTION ***************************************************************

    // ************************** DIRECTOR **********************

    $quentinTarantino = new Director("Quentin", "Tarantino", "Male", "1963/03/27");

    // ************************** ROLES *************************

    $vincentVega = new Role("Vincent Vega");
    $julesWinnfield = new Role("Jules Winnfield");
    $miaWallace = new Role("Mia Wallace");
    $butchCoolidge = new Role("Butch Coolidge");
    $marcellusWallace = new Role("Marcellus Wallace");

    // ************************** ACTORS ************************

    $johnTravolta = new Actor("John", "Travolta", "Male", "1954/02/18");
    $samuelLJackson = new Actor("Samuel L.", "Jackson", "Male", "1948/12/21");
    $umaThurman = new Actor("Uma", "Thurman", "Female", "1970/04/29");
    $bruceWillis = new Actor("Bruce", "Willis", "Male", "1955/03/19");
    $vingRhames = new Actor("Ving", "Rhames", "Male", "1959/05/12");

    // ************************** MOVIE ************************

    $pulpFiction = new Movie
    (
        "Pulp Fiction",
        $crime,
        "1994/10/14",
        154,
        $quentinTarantino,
        "L'odyssée sanglante et burlesque de petits malfrats dans la jungle de Hollywood, à travers trois histoires qui s'entrecroisent."
    );

    // ************************** CASTINGS **********************

    $vincentVegaCasting = new Casting($vincentVega, $johnTravolta, $pulpFiction);
    $julesWinnfieldCasting = new Casting($julesWinnfield, $samuelLJackson, $pulpFiction);
    $miaWallaceCasting = new Casting($miaWallace, $umaThurman, $pulpFiction);
    $butchCoolidgeCasting = new Casting($butchCoolidge, $bruceWillis, $pulpFiction);
    $marcellusWallaceCasting = new Casting($marcellusWallace, $vingRhames, $pulpFiction);












    // ********************************************************************************************************************************* 
    // **************************************************** FORREST GUMP ***************************************************************

    // ************************** DIRECTOR **************************

    $robertZemeckis = new Director("Robert", "Zemeckis", "Male", "1951/05/14");

    // ************************** ROLES *************************

    $forrestGump = new Role("Forrest Gump");
    $ltDan = new Role("Lieutenant Dan");
    $jennyCurran = new Role("Jenny Curran");
    $bubbaBlue = new Role("Bubba Blue");
    $mrsGump = new Role("Mrs. Gump");

    // ************************** ACTORS ************************

    $tomHanks = new Actor("Tom", "Hanks", "Male", "1956/07/09");
    $garySinise = new Actor("Gary", "Sinise", "Male", "1955/03/17");
    $robinWright = new Actor("Robin", "Wright", "Female", "1966/04/08");
    $mykeltiWilliamson = new Actor("Mykelti", "Williamson", "Male", "1960/03/04");
    $sallyField = new Actor("Sally", "Field", "Female", "1946/11/06");

    // ************************** MOVIE ************************

    $forrestGumpMovie = new Movie
    (
        "Forrest Gump",
        $drama,
        "1994/07/06",
        142,
        $robertZemeckis,
        "Forrest Gump est un homme simple d'esprit mais doté d'un coeur immense. Il traverse les décennies et rencontre des personnalités marquantes, tout en étant témoin de grands événements historiques. Tout au long de son parcours, il ne perd jamais de vue son amour de jeunesse, Jenny."
    );

    // ************************** CASTINGS **********************

    $forrestGumpCasting = new Casting($forrestGump, $tomHanks, $forrestGumpMovie);
    $ltDanCasting = new Casting($ltDan, $garySinise, $forrestGumpMovie);
    $jennyCurranCasting = new Casting($jennyCurran, $robinWright, $forrestGumpMovie);
    $bubbaBlueCasting = new Casting($bubbaBlue, $mykeltiWilliamson, $forrestGumpMovie);
    $bubbaBlueCasting = new Casting($mrsGump, $sallyField, $forrestGumpMovie);









    
    // **************************************************** TEST ****************************************************
    
    $valKilmer = new Actor("Val", "Kilmer", "Male", "1959/12/31");
    $georgeClooney = new Actor("George", "Clooney", "Male", "1961/05/06");

    // echo "<h2>TESTS</h2>";

    // // *********************************************************************************************************
    
    // echo "<h3>Get actor by role<br>******************************</h3>";

    // echo "<strong>Acteurs ayant joué le rôle de " . $batman . " : <br></strong>" . $batman->getActors();

    // // *********************************************************************************************************
    
    // echo "<h3>Get movie by role<br>******************************</h3>";

    // echo "<strong>Films dans lequel le rôle " . $batman . " est joué: <br></strong>" . $batman->getMovies();

    // // *********************************************************************************************************
    
    // echo "<h3>Get role by actor<br>******************************</h3>";

    // echo "<strong>Rôles jouées par " . $tobeyMaguire . ": <br></strong>" . $tobeyMaguire->getRoles();

    // // *********************************************************************************************************
    
    // echo "<h3>Get movies by actor<br>******************************</h3>";

    // echo "<strong>Filmographie de " . $tobeyMaguire . ": <br></strong>" . $tobeyMaguire->getMovies();

    // // *********************************************************************************************************
    
    // echo "<h3>Get full casting<br>******************************</h3>";

    // echo "Dans le film <strong>" . $movieBatman . ":<br></strong>"
    //     . "<strong>" . $batmanCasting->getRole() . "</strong>" . " a été joué par " . "<strong>" . $batmanCasting->getActor() . "</strong>, "
    //     . "<strong>" . $vickiValeCasting->getRole() . "</strong>" . " a été joué par " . "<strong>" . $vickiValeCasting->getActor() . "</strong>, "
    //     . "<strong>" . $jokerCasting->getRole() . "</strong>" . " a été joué par " . "<strong>" . $jokerCasting->getActor() . "</strong>, "
    //     . "<strong>" . $carlGrissomCasting->getRole() . "</strong>" . " a été joué par " . "<strong>" . $carlGrissomCasting->getActor() . "</strong>, "
    //     . "<strong>" . $alfredPennyworthCasting->getRole() . "</strong>" . " a été joué par " . "<strong>" . $alfredPennyworthCasting->getActor() . "</strong>";

    // // *********************************************************************************************************
    
    // echo "<h3>Get movies by director<br>******************************</h3>";

    // echo "<strong>Filmographie de " . $samMendes . " :</strong>" . $samMendes->getMovies();

    // // *********************************************************************************************************
    
    // echo "<h3>Get movies by genre<br>******************************</h3>";

    // echo "Le genre " . $spy . " est associé à " . $spy->getNbMovies() . " films : <br>" . $spy->getMovies();

    ?>

</body>

</html>