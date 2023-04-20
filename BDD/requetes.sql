-- a. Informations d’un film (id_film) : titre, année, durée (au format HH:MM) et réalisateur
SELECT title "Movie title", YEAR(release_date) AS "Release date", LENGTH AS "Movie duration", person.first_name AS "Director", person.last_name AS ""
FROM movie
INNER JOIN director ON movie.id_director = director.id_director
INNER JOIN person ON director.id_person = person.id_person
WHERE movie.id_movie = 1

-- b. Liste des films dont la durée excède 2h15 classés par durée (du plus long au plus court)
SELECT title AS "Movies longer than 2h15", LENGTH AS "Duration (min)"
FROM movie
WHERE LENGTH > 145
ORDER BY LENGTH DESC

-- c. Liste des films d’un réalisateur (en précisant l’année de sortie)
SELECT title AS "Robert Zemeckis' movies", YEAR(release_date) AS "Release date"
FROM movie
INNER JOIN director ON movie.id_director = director.id_director
INNER JOIN person ON director.id_person = person.id_person
WHERE person.first_name = "Robert" AND person.last_name = "Zemeckis"

-- d. Nombre de films par genre (classés dans l’ordre décroissant)
SELECT movie_genre.genre_name AS "Movie genre", COUNT(title) AS "Movies"
FROM movie
INNER JOIN set_movie_genre ON movie.id_movie = set_movie_genre.id_movie
INNER JOIN movie_genre ON set_movie_genre.id_movie_genre = movie_genre.id_movie_genre
GROUP BY movie_genre.genre_name
ORDER BY COUNT(title) DESC

-- e. Nombre de films par réalisateur (classés dans l’ordre décroissant)
SELECT first_name AS "Director", last_name AS "", COUNT(title) AS "Movies"
FROM person
INNER JOIN director ON director.id_person = person.id_person
INNER JOIN movie ON director.id_director = movie.id_director
GROUP BY first_name, last_name
ORDER BY COUNT(title) DESC

-- f. Casting d’un film en particulier (id_film) : nom, prénom des acteurs + sexe
SELECT first_name AS "Actor(s)/Actress(es) who played in Batman", last_name "", genre AS "Genre", role_name AS "Role played" -- (j'ai ajouté le rôle joué)
FROM person
INNER JOIN actor ON person.id_person = actor.id_person
INNER JOIN casting ON actor.id_actor = casting.id_actor
INNER JOIN movie ON casting.id_movie = movie.id_movie
INNER JOIN role ON casting.id_role = role.id_role
WHERE movie.id_movie = 1

-- g. Films tournés par un acteur en particulier (id_acteur) avec leur rôle et l’année de sortie (du film le plus récent au plus ancien)
SELECT title AS "Movie(s) starring Leonardo DiCaprio", release_date AS "Release date", role_name AS "Role played"
FROM movie
INNER JOIN casting ON movie.id_movie = casting.id_movie
INNER JOIN role ON casting.id_role = role.id_role
INNER JOIN actor ON casting.id_actor = actor.id_actor
WHERE casting.id_actor = (
	SELECT id_actor
	FROM actor
	WHERE id_actor = 16
	)
ORDER BY release_date ASC

-- h. Listes des personnes qui sont à la fois acteurs et réalisateurs


-- i. Liste des films qui ont moins de 5 ans (classés du plus récent au plus ancien)
SELECT title AS "Movies from the 5 past years" , release_date AS "Release date"
FROM movie
WHERE release_date > NOW() - INTERVAL 5 YEAR
ORDER BY release_date DESC

-- j. Nombre d’hommes et de femmes parmi les acteurs


-- k. Liste des acteurs ayant plus de 50 ans (âge révolu et non révolu)


-- l. Acteurs ayant joué dans 3 films ou plus

