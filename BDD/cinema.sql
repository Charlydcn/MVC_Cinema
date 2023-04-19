CREATE TABLE ROLE(
   id_role INT,
   role_name VARCHAR(50) NOT NULL,
   PRIMARY KEY(id_role)
);

CREATE TABLE MOVIE_GENRE(
   id_movie_genre INT,
   genre_name VARCHAR(50) NOT NULL,
   PRIMARY KEY(id_movie_genre)
);

CREATE TABLE PERSON(
   id_person INT,
   first_name VARCHAR(50) NOT NULL,
   last_name VARCHAR(50) NOT NULL,
   birthdate DATE NOT NULL,
   genre VARCHAR(20),
   PRIMARY KEY(id_person)
);

CREATE TABLE ACTOR(
   id_actor INT,
   id_person INT NOT NULL,
   PRIMARY KEY(id_actor),
   UNIQUE(id_person),
   FOREIGN KEY(id_person) REFERENCES PERSON(id_person)
);

CREATE TABLE DIRECTOR(
   id_director INT,
   id_person INT NOT NULL,
   PRIMARY KEY(id_director),
   UNIQUE(id_person),
   FOREIGN KEY(id_person) REFERENCES PERSON(id_person)
);

CREATE TABLE MOVIE(
   id_movie INT,
   title VARCHAR(100) NOT NULL,
   release_date DATE NOT NULL,
   length INT NOT NULL,
   synopsis TEXT,
   rating INT,
   poster VARCHAR(255),
   id_director INT NOT NULL,
   PRIMARY KEY(id_movie),
   FOREIGN KEY(id_director) REFERENCES DIRECTOR(id_director)
);

CREATE TABLE CASTING(
   id_casting INT,
   id_role INT NOT NULL,
   id_actor INT NOT NULL,
   id_movie INT NOT NULL,
   PRIMARY KEY(id_casting),
   FOREIGN KEY(id_role) REFERENCES ROLE(id_role),
   FOREIGN KEY(id_actor) REFERENCES ACTOR(id_actor),
   FOREIGN KEY(id_movie) REFERENCES MOVIE(id_movie)
);

CREATE TABLE set_movie_genre(
   id_movie INT,
   id_movie_genre INT,
   PRIMARY KEY(id_movie, id_movie_genre),
   FOREIGN KEY(id_movie) REFERENCES MOVIE(id_movie),
   FOREIGN KEY(id_movie_genre) REFERENCES MOVIE_GENRE(id_movie_genre)
);
