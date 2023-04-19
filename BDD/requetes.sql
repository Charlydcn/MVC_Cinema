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

-- b. Liste des films dont la durée excède 2h15 classés par durée (du plus long au plus court


-- c. Liste des films d’un réalisateur (en précisant l’année de sortie)


-- d. Nombre de films par genre (classés dans l’ordre décroissant)


-- e. Nombre de films par réalisateur (classés dans l’ordre décroissant)


-- f. Casting d’un film en particulier (id_film) : nom, prénom des acteurs + sexe


-- g. Films tournés par un acteur en particulier (id_acteur) avec leur rôle et l’année de sortie 


-- (du film le plus récent au plus ancien)


-- h. Listes des personnes qui sont à la fois acteurs et réalisateurs


-- i. Liste des films qui ont moins de 5 ans (classés du plus récent au plus ancien)


-- j. Nombre d’hommes et de femmes parmi les acteurs


-- k. Liste des acteurs ayant plus de 50 ans (âge révolu et non révolu)


-- l. Acteurs ayant joué dans 3 films ou plus

