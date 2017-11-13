/*-- Names of all actors in the movie 'Die Another Day' - name is formatted as requested */

SELECT CONCAT(A.first,' ', A.last) as "Full Name" 
FROM Actor A, MovieActor MA 
WHERE A.id=MA.aid AND 
MA.mid = (SELECT id FROM Movie WHERE title = 'Die Another Day') ;

/* Count of all the actors who acted in Multiple Movies */

SELECT count(*) as "Actors Count" 
FROM (SELECT aid, count(aid) AS cnt FROM MovieActor GROUP BY aid HAVING cnt >1) AS Dups;

-- Below query is to find how many actors are directors as well

SELECT count(*) as "Count of Actors who are Directors" 
FROM Actor A, Director D 
WHERE A.id=D.id;

/*-- Below query is to find how many movies does not have Director in MovieDirector table */

SELECT count(*) as "Count of Movies with no Director Mapping" 
FROM Movie 
WHERE id NOT IN (SELECT mid from MovieDirector);

/*-- Below query is to find how many movies does not have Actor mapping in MovieActor Table*/

SELECT count(*) AS "Count of Movies with no Actor mapping" 
FROM Movie 
WHERE id NOT IN (SELECT mid from MovieActor);


