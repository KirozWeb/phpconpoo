/*DROP DATABASE IF EXISTS mexflix;
CREATE DATABASE IF NOT EXISTS mexflix;*/

USE mexflix;


/*Tabla de Catalogo*/

CREATE TABLE estado(
    estado_id INTEGER UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    estado_ VARCHAR(20) NOT NULL
);
/*Tabla de Datos*/
CREATE TABLE movieseries(
    imdb_id CHAR(9) PRIMARY KEY,
    title VARCHAR(80) NOT NULL,
    plot TEXT,
    author VARCHAR(100) DEFAULT 'Pending',
    actors VARCHAR(100) DEFAULT 'Pending',
    country VARCHAR(30) DEFAULT 'Unknown',
    premiere YEAR(4) NOT NULL,
    poster VARCHAR(150) DEFAULT 'no-poster.jpg',
    trailer VARCHAR(150) DEFAULT 'no-trailer.jpg',
    rating DECIMAL(2,1),
    genres VARCHAR(50) NOT NULL,
    estado_id INTEGER UNSIGNED NOT NULL,
    category ENUM('Movie', 'Serie') NOT NULL,
    FULLTEXT KEY search(title, author, actors, genres),
    FOREIGN KEY (estado_id) REFERENCES estado(estado_id)
        ON DELETE RESTRICT ON UPDATE CASCADE
);



CREATE TABLE users(
    user VARCHAR(15) PRIMARY KEY,
    email VARCHAR(80) UNIQUE NOT NULL,
    names VARCHAR(100) NOT NULL,
    birthday DATE NOT NULL,
    pass CHAR(32) NOT NULL,
    role ENUM('Admin', 'User') NOT NULL
);

/*'Coming Soon', 'Release', 'In Issue', 'Finished', 'Canceled'*/

INSERT INTO estado (estado_id, estado_) VALUES
    (1,'Coming Soon'),
    (2, 'Release'),
    (3, 'In Issue'),
    (4, 'Finished'),
    (5, 'Canceled');

INSERT INTO users (user, email, names, birthday, pass, role) VALUES
('@jonmircha','jonmircha@bextlan.com', 'Jonathan Mircha', '1984-05-23', MD5('chafo'), 'Admin'),
('@user', 'usuario@bextlan.com', 'Usario Mortal', '2000-12-19', MD5('chimichangas'), 'User');

INSERT INTO movieseries (imdb_id, title, plot, genres, author, actors, country, premiere, trailer,
    poster, rating, estado_id, category) VALUES
    
    

    ('tt0109771',
    "Farinelli",
    "Farinelli is the artistic name of Carlo Broschi, a young singer in Handel's time. He was castrated in his childhood in order to preserve his voice. During his life he becomes a very famous opera singer, managed by his mediocre brother (Riccardo).",
    "Biography, Drama, Music",
    "Gérard Corbiau",
    "Stefano Dionisi, Enrico Lo Verso, Elsa Zylberstein",
    "France, Italy, Belgium, United Kingdom",
    "1994",
    "nada",
    "https://m.media-amazon.com/images/M/MV5BMmE5MjllZDYtNGVmZS00YjBiLWExMDctYjMyNjUxMjY5ZGU3XkEyXkFqcGdeQXVyNjMwMjk0MTQ@._V1_SX300.jpg",
    6.8,
    5,
    'Movie'),
    
    
    
    ('tt0119177',
    "Gattaca",
    "In the not-too-distant future, a less-than-perfect man wants to travel to the stars. Society has categorized Vincent Freeman as less than suitable given his genetic make-up and he has become one of the underclass of humans that are only useful for menial jobs. To move ahead, he assumes the identity of Jerome Morrow, a perfect genetic specimen who is a paraplegic as a result of a car accident. With professional advice, Vincent learns to deceive DNA and urine sample testing. Just when he is finally scheduled for a space mission, his program director is killed and the police begin an investigation, jeopardizing his secret.",
    "Drama, Sci-Fi, Thriller",
    "Andrew Niccol",
    "Ethan Hawke, Uma Thurman",
    "United States",
    "1997",
    "nada",
    "https://m.media-amazon.com/images/M/MV5BODI3ZTc5NjktOGMyOC00NjYzLTgwZDYtYmQ4NDc1MmJjMjRlXkEyXkFqcGdeQXVyMTQxNzMzNDI@._V1_SX300.jpg",
    7.8,
    4,
    'Movie'),
    
    ('tt0119217',
    "Good Will Hunting",
    "A touching tale of a wayward young man who struggles to find his identity, living in a world where he can solve any problem, except the one brewing deep within himself, until one day he meets his soul mate who opens his mind and his heart.",
    "Drama, Romance",
    "Gus Van Sant",
    "Robin Williams, Matt Damon, Ben Affleck",
    "United States",
    "1997",
    "nada",
    "https://m.media-amazon.com/images/M/MV5BOTI0MzcxMTYtZDVkMy00NjY1LTgyMTYtZmUxN2M3NmQ2NWJhXkEyXkFqcGdeQXVyMTQxNzMzNDI@._V1_SX300.jpg",
    8.3,
    3,
    'Movie'),
    
    ('tt0075148',
    "Rocky",
    "Rocky Balboa is a struggling boxer trying to make the big time, working as a debt collector for a pittance. When heavyweight champion Apollo Creed visits Philadelphia, his managers want to set up an exhibition match between Creed and a struggling boxer, touting the fight as a chance for a \"nobody\" to become a \"somebody\". The match is supposed to be easily won by Creed, but someone forgot to tell Rocky, who sees this as his only shot at the big time.",
    "Drama, Sport",
    "John G. Avildsen",
    "Sylvester Stallone, Talia Shire, Burt Young",
    "United States",
    "1976",
    "nada",
    "https://m.media-amazon.com/images/M/MV5BMTY5MDMzODUyOF5BMl5BanBnXkFtZTcwMTQ3NTMyNA@@._V1_SX300.jpg",
    8.1,
    2,
    'Movie'),
    
    ('tt0133093',
    "The Matrix",
    "Thomas A. Anderson is a man living two lives. By day he is an average computer programmer and by night a hacker known as Neo. Neo has always questioned his reality, but the truth is far beyond his imagination. Neo finds himself targeted by the police when he is contacted by Morpheus, a legendary computer hacker branded a terrorist by the government. As a rebel against the machines, Neo must confront the agents: super-powerful computer programs devoted to stopping Neo and the entire human rebellion.",
    "Action, Sci-Fi",
    "Lana Wachowski, Lilly Wachowski",
    "Keanu Reeves, Laurence Fishburne, Carrie-Anne Moss",
    "United States, Australia",
    "1999",
    "nada",
    "https://m.media-amazon.com/images/M/MV5BNzQzOTk3OTAtNDQ0Zi00ZTVkLWI0MTEtMDllZjNkYzNjNTc4L2ltYWdlXkEyXkFqcGdeQXVyNjU0OTQ0OTY@._V1_SX300.jpg",
    8.7,
    2,
    'Movie'),
    
    ('tt7631058',
    "The Lord of the Rings: The Rings of Power",
    "This epic drama is set thousands of years before the events of J.R.R. Tolkien’s The Hobbit and The Lord of the Rings, and will take viewers back to an era in which great powers were forged, kingdoms rose to glory and fell to ruin, unlikely heroes were tested, hope hung by the finest of threads, and the greatest villain that ever flowed from Tolkien’s pen threatened to cover all the world in darkness. Beginning in a time of relative peace, the series follows an ensemble cast of characters, both familiar and new, as they confront the long-feared re-emergence of evil to Middle-earth. From the darkest depths of the Misty Mountains, to the majestic forests of the elf-capital of Lindon, to the breathtaking island kingdom of Númenor, to the furthest reaches of the map, these kingdoms and characters will carve out legacies that live on long after they are gone.",
    "Action, Adventure, Drama",
    "N/A",
    "Morfydd Clark, Peter Mullan, Benjamin Walker",
    "United States",
    "2022",
    "nada",
    "https://m.media-amazon.com/images/M/MV5BOTUzYTMwYjAtNzMzMS00YjhmLWEwOGQtY2MxZGEyMzMwZDI0XkEyXkFqcGdeQXVyMjkwOTAyMDU@._V1_SX300.jpg",
    8.6,
    3,
    'Movie'),
    
    ('tt0372784',
    "Batman Begins",
    "When his parents are killed, billionaire playboy Bruce Wayne relocates to Asia, where he is mentored by Henri Ducard and Ra's Al Ghul in how to fight evil. When learning about the plan to wipe out evil in Gotham City by Ducard, Bruce prevents this plan from getting any further and heads back to his home. Back in his original surroundings, Bruce adopts the image of a bat to strike fear into the criminals and the corrupt as the icon known as \"Batman\". But it doesn't stay quiet for long.",
    "Action, Crime, Drama",
    "Christopher Nolan",
    "Christian Bale, Michael Caine, Ken Watanabe",
    "United States, United Kingdom",
    "2005",
    "nada",
    "https://m.media-amazon.com/images/M/MV5BOTY4YjI2N2MtYmFlMC00ZjcyLTg3YjEtMDQyM2ZjYzQ5YWFkXkEyXkFqcGdeQXVyMTQxNzMzNDI@._V1_SX300.jpg",
    8.2,
    4,
    'Movie'),
    
    ('tt0464141',
    "The Orphanage",
    "Laura, a former orphan, raises her adopted son Simón together with her husband Carlos in an old house and former orphanage where she was raised. While at the orphanage Simón tells Laura that he has five invisible friends which she believes are a product of his active imagination. Laura decides to reopen the orphanage to cater for disabled children and throws a party. During the party Simón tries to persuade Laura to go and take a look at his friends cabin but she's too busy. Later on she sees a mysterious masked boy and realizes that Simón has also disappeared. Laura feels the presence of other people in the house and months later Laura invites a team of parapsychologists to try to unravel the mystery.",
    "Drama, Horror, Mystery",
    "J.A. Bayona",
    "Belén Rueda, Fernando Cayo, Roger Príncep",
    "Spain",
    "2007",
    "nada",
    "https://m.media-amazon.com/images/M/MV5BYzFlOWZmYzctYTkwMi00MjIxLWIxNjYtYTcwOGJlNDFhMjE0XkEyXkFqcGdeQXVyMjgyNjk3MzE@._V1_SX300.jpg",
    7.4,
    4,
    'movie'),
    
    ('tt0499549',
    "Avatar",
    "When his brother is killed in a robbery, paraplegic Marine Jake Sully decides to take his place in a mission on the distant world of Pandora. There he learns of greedy corporate figurehead Parker Selfridge's intentions of driving off the native humanoid  in order to mine for the precious material scattered throughout their rich woodland. In exchange for the spinal surgery that will fix his legs, Jake gathers knowledge, of the Indigenous Race and their Culture, for the cooperating military unit spearheaded by gung-ho Colonel Quaritch, while simultaneously attempting to iepic battle for the fate of Pandora.",
    "Action, Adventure, Fantasy",
    "James Cameron",
    "Sam Worthington, Zoe Saldana, Sigourney Weaver",
    "United States",
    "2009",
    "nada",
    "https://m.media-amazon.com/images/M/MV5BMTYwOTEwNjAzMl5BMl5BanBnXkFtZTcwODc5MTUwMw@@._V1_SX300.jpg",
    7.8,
    3,
    'Movie'),

    ('tt0103874',
    "Bram Stoker's Dracula",
    "This version of Dracula is closely based on Bram Stoker's classic novel. Young barrister Jonathan Harker is assigned to a gloomy village in the mists of eastern Europe. He is captured and imprisoned by the undead vampire Dracula, who travels to London, inspired by a photograph of Harker's betrothed, Mina Murray. In Britain, Dracula begins a reign of seduction and terror, draining the life from Mina's closest friend, Lucy Westenra. Lucy's friends gather together to try to drive Dracula away.",
    "Drama, Fantasy, Horror",
    "Francis Ford Coppola",
    "Gary Oldman, Winona Ryder, Anthony Hopkins",
    "United States",
    "1992",
    "nada",
    "https://m.media-amazon.com/images/M/MV5BNjcyMDZlMTktYTIxOC00ZWFhLWJkYzgtNWNiYjAwYTFkNjIyXkEyXkFqcGdeQXVyNTIzOTk5ODM@._V1_SX300.jpg",
    7.4,
    4,
    'Movie');

INSERT INTO movieseries SET imdb_id = 'tt3749900', title = 'Gotham', genres = 'Crime, Drama, Thriller', premiere = '2014', estado_id = 3;

UPDATE movieseries SET author = 'Bruno Heller', actors = "Ben McKenzie, Jada Pinkett Smith, Donal Logue", country = 'USA', poster = "https://m.media-amazon.com/images/M/MV5BMTU5NjQ2MTU4NV5BMl5BanBnXkFtZTgwOTYyNTAwNzM@._V1_SX300.jpg",
trailer = "nada", rating = 8.0, category = 'Serie', plot = "The story behind Detective James Gordon's rise to prominence in Gotham City in the years before Batman's arrival." WHERE imdb_id = 'tt3749900';

DELETE FROM movieseries WHERE imdb_id = 'tt3749900';

SELECT * FROM movieseries;

SELECT COUNT(*) FROM movieseries;

select ms.title, ms.category, ms.country, ms.genres, s.estado_ 
    FROM movieseries as ms inner join estado as s on ms.estado_id = s.estado_id 
    where s.estado_ = 'Canceled' or s.estado_ = 'Coming Soon' order by ms.premiere;

select ms.title, ms.category, ms.country, ms.genres, ms.premiere, s.estado_ 
    FROM movieseries as ms inner join estado as s on ms.estado_id = s.estado_id 
    where (s.estado_ = 'Release' or s.estado_ = 'Finished' or s.estado_ = 'In Issue')
    and ms.category = 'Movie' order by ms.premiere;

select * from movieseries where match(title, author, actors, genres)
    against('Bale' in boolean mode);


SELECT * FROM TABLE
    where match(field1, field2, field3, field4)
    against('a_search' in boolean mode);

select ms.title, ms.category, ms.country, ms.genres, ms.premiere, s.estado_
    from movieseries as ms
    inner join estado as s
    on ms.estado_id = s.estado_id
    where match(ms.title, ms.author, ms.actors, ms.genres)
    against('a_search' IN BOOLEAN MODE);

select * from estado;

select count(*) from movieseries where estado_id = 6;

/*MySQL permite eliminar los registros existentes en la tabla movieseries del 
estado_id = 1 'Coming Soon' */
DELETE FROM movieseries where estado_id = 1;

/*Permite eliminar el registro con el estado_id 1 porque ya no hay registros
asociados en la tabla dependiente(movieseries) */
DELETE FROM estado where estado_id = 1;

/*MySQL no me permite eliminar el estado_id 2 porque existen registros asociados a el en
la tabla dependiente(movieseries)*/
DELETE FROM estado where estado_id = 2;

select ms.title, ms.estado, s.estado_id, s.estado
    from movieseries as ms
    inner join estado as s
    on ms.estado_id = s.estado_id
    order by s.estado, ms.title;

/*Cuando actualizo los valores del registro del estado 2, en automatico se actualizan 
los registros vinculados en la tabla dependiente (movieseries)*/
update estado
    set estado_id = 7, estado = 'Estrenada'
    where estado_id = 2;
