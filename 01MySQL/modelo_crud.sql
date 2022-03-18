/*Listado de Operaciones (queries) CRUD de mexflix */
/*movieseries*/

    /*Crear movieseries*/
    insert into movieseries set imdb_id = 'tt3749900', title = 'Gotam',
    plot = '', author = '', actors = '', country = '', premiere = '2014', trailer = '',
    poster = '', rating = 8.0, genres = 'Crime, Drama, Thriller', category = 'Serie',
    estado_id = 3;

    REPLACE INTO movieseries SET imdb_id = 'tt0816692', 
        title = 'interestellar', plot = 'Earth\'s future has been riddled by disasters, famines, and droughts. There is only one way to ensure mankind\'s survival: Interstellar travel. A newly discovered wormhole in the far reaches of our solar system allows a team of astronauts to go where no man has gone before, a planet that may have the right environment to sustain human life.', author = 'Christopher Nolan', actors = 'Matthew McConaughey, Anne Hathaway, Jessica Chastain',
        country = 'United States, United Kingdom, Canada', premiere = '2014', trailer = 'https://www.youtube.com/watch?v=UoSSbmD9vqc', 
        poster = 'https://m.media-amazon.com/images/M/MV5BZjdkOTU3MDktN2IxOS00OGEyLWFmMjktY2FiMmZkNWIyODZiXkEyXkFqcGdeQXVyMTMxODk2OTU@._V1_SX300.jpg', rating = 8, genres = 'Adventure, Drama, Sci-Fi', estado_id = 1, 
        category = 'Movie';

    /*Actualizar movieseries*/
    update movieseries set title = 'Gotham', plot = "The story behind Detective James 
    Gordon's rise to prominence in Gotham City in the years before Batman's arrival.",
    genres = "Action, Crime, Drama",author = "N/A", actors = "Ben McKenzie, Jada Pinkett Smith, Donal Logue",
    Country = "United States",premiere = "2014–2019", trailer = "nada", poster = "https://m.media-amazon.com/images/M/MV5BMTU5NjQ2MTU4NV5BMl5BanBnXkFtZTgwOTYyNTAwNzM@._V1_SX300.jpg",
    rating = 8.0, category = 'Serie', estado_id = 3
    WHERE imdb_id = 'TT3749900';
    /*Eliminar movieseries*/
    DELETE FROM movieseries WHERE imdb_id = 'tt3749900';

    /*Buscar todas las movieseries*/    
    SELECT ms.imdb_id, ms.title, ms.plot ms.author, ms.actors, ms.country, ms.premiere,
    ms.poster, ms.trailer, ms.rating, ms.genres, ms.category, s.estado_id FROM movieseries AS ms
    INNER JOIN estado AS s
    ON ms.estado_id = s.estado_id;

    /*Buscar una movieseries por titulos, personas (actores,autores), generos*/   

    SELECT ms.imdb_id, ms.title, ms.plot ms.author, ms.actors, ms.country, ms.premiere,
    ms.poster, ms.trailer, ms.rating, ms.genres, ms.category, s.estado_id FROM movieseries AS ms
    INNER JOIN estado AS s
    ON ms.estado_id = s.estado_id;
    WHERE MATCH(ms.title, ms.author, ms.actors, ms.genres)
    AGAINST('drama' IN BOOLEAN MODE);     
    /*Buscar una movieseries por categoria*/

    SELECT ms.imdb_id, ms.title, ms.plot ms.author, ms.actors, ms.country, ms.premiere,
    ms.poster, ms.trailer, ms.rating, ms.genres, ms.category, s.estado_id FROM movieseries AS ms
    INNER JOIN estado AS s
    ON ms.estado_id = s.estado_id;
    WHERE ms.category = 'Movie';
    /*Buscar una movieseries por estado*/

    SELECT ms.imdb_id, ms.title, ms.plot ms.author, ms.actors, ms.country, ms.premiere,
    ms.poster, ms.trailer, ms.rating, ms.genres, ms.category, s.estado_id FROM movieseries AS ms
    INNER JOIN estado AS s
    ON ms.estado_id = s.estado_id;
    WHERE ms.estado = 1;
/*estado*/
    /*Crear estado*/
    INSERT INTO estado SET estado_id = 0, estado_ = 'Otro Status';
    /*Actualizar estado*/
    UPDATE estado SET estado_ = 'Other Status' WHERE estado_id = 6;
    /*Eliminar estado*/
    DELETE FROM estado WHERE estado_id = 6;
    /*Buscar Todos los estados*/
    SELECT * FROM estado;
    /*Buscar un estado por estado_id*/
    SELECT * FROM estado WHERE estado_id = 3;
/*users*/
    /*Crear users*/
    INSERT INTO users SET user = '@usuario', email = 'usuario@midominio.com',
    name = 'Soy un usuario', birthday = '1988-10*09', pass = MD5('un_password'),
    role = 'Admin';


    /*Salvar status */
    REPLACE INTO estado (estado_id, estado_) VALUES (0, 'Otro Status');
    REPLACE estado SET estado_id = 0, estado_ = 'Otro Status';
    /*Actualizar*/
        /*Datos generales*/
        UPDATE users SET name = 'Soy un Usuario', birthday = '1984-10-09', role = 'User'
        WHERE user = '@usuario' AND email = 'usuario@midominio.com';
        /*Password*/
        UPDATE users SET pass = MD5('un_nuevo_password')
        WHERE user = '@usuario' AND email = 'usuario@midominio.com';
    /*Eliminar user*/
        DELETE FROM users WHERE user = '@usuario' AND email = 'usuario@midominio.com';
    /*Buscar Todo los users*/
        SELECT * FROM users;
    /*Buscar un user por:*/
            /*user*/
            SELECT * FROM users WHERE user = '@usuario';            
            /*email*/
            SELECT * FROM users WHERE email = 'usuario@midominio.com';
            /*role*/
            SELECT * FROM users WHERE role = 'User';


    /*REPLACE*/

    REPLACE users SET user = '@usuario', pass = MD5('un_nuevo_password');
    REPLACE users SET user = '@usuario', email = 'usuario@midominio.com', name = 'Soy 
    un Usuario', birthday = '1988-09-08', pass = MD5('un_nuevo_password'), role = 'Admin';


