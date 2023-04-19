-- a. Informations d’un film (id_film) : titre, année, durée (au format HH:MM) et réalisateur
SELECT title "Movie title", YEAR(release_date) AS "Release Date", LENGTH AS "Movie Duration", person.first_name AS "Director", person.last_name AS ""
FROM movie
INNER JOIN director ON movie.id_director = director.id_director
INNER JOIN person ON director.id_person = person.id_person
WHERE movie.id_movie IN (
	SELECT id_movie
	FROM movie
	WHERE title = "Batman"
	)

-- b. Liste des films dont la durée excède 2h15 classés par durée (du plus long au plus court)
SELECT title AS "Movies longer than 2h15"
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

-- g. Films tournés par un acteur en particulier (id_acteur) avec leur rôle et l’année de sortie 


-- (du film le plus récent au plus ancien)


-- h. Listes des personnes qui sont à la fois acteurs et réalisateurs


-- i. Liste des films qui ont moins de 5 ans (classés du plus récent au plus ancien)


-- j. Nombre d’hommes et de femmes parmi les acteurs


-- k. Liste des acteurs ayant plus de 50 ans (âge révolu et non révolu)


-- l. Acteurs ayant joué dans 3 films ou plus

