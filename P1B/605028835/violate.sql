/* CHECK CONSTRAINT TO NOT ALLOW UPDATING ID int MOVIE TABLE THAT IS > MAXMOVIEID
*/
UPDATE Movie SET ID=4751 WHERE ID=10;

/*CHECK CONSTRAINT TO ADD MOVIE with year < 1870
 */
UPDATE Movie SET year=1830 where ID=20;

-- CHECK CONSTRAINT TO ADD Actor with ID greater than Maxperson ID

UPDATE Actor SET ID = 69001 WHERE ID=11;

/*--1. PRIMARY Constraint violation on Movie, it will violate because there is already a record with ID 20 in Movie table
*/

INSERT INTO Movie VALUES(20,"24 7: Twenty Four Seven",1997,"R","Scala Films");

-- This is  the error for Primary Key constraint in Movie Table

ERROR 1062 (23000) at line 16: Duplicate entry '20' for key 'PRIMARY'



/*--2. PRIMARY KEY Constraint violation on Actor table, it will violate because there is already a record with ID =1000 in Actor table
*/

INSERT INTO Actor VALUES(1000,"Allen","Marty","Male","1992-03-34","");

-- This is the error for Primary Key constraint in Actor Table
ERROR 1062 (23000) at line 21: Duplicate entry '1000' for key 'PRIMARY'



/*
--  3. PRIMARY KEY Constration violation on Director table because Director ID 16 already exist in the table
*/

INSERT INTO Director VALUES(16,"Aames","Will","1970-03-15","");

-- This is the error for Primary Key constraint in Director Table``
ERROR 1062 (23000) at line 26: Duplicate entry '16' for key 'PRIMARY'


/*-- 4. FOREIGN KEY Constraint violation on MovieGenre Table by inserting movie ID that does not exist in Movie table
*/

INSERT INTO MovieGenre VALUES(1,"Romance");

-- Below is the error for Foreign Key constraint in MovieiGenre Table
ERROR 1452 (23000) at line 31: Cannot add or update a child row: a foreign key constraint fails (`CS143`.`MovieGenre`, CONSTRAINT `MovieGenre_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `Movie` (`id`) ON UPDATE CASCADE)


/*-- 5. FOREIGN KEY Constraint violation on MovieDirector table by inserting director id that does not exist in Director table
*/

INSERT INTO MovieDirector VALUES(1,112);

-- Below is the error for Foreign Key constraint in MovieDirector Table
ERROR 1452 (23000) at line 36: Cannot add or update a child row: a foreign key constraint fails (`CS143`.`MovieDirector`, CONSTRAINT `MovieDirector_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `Movie` (`id`) ON UPDATE CASCADE)


/*--6. FOREIGN KEY Constraint violation on MovieActor table by inserting actor id that does not exist in actor table
*/

INSERT INTO MovieActor VALUES(2,8,"Bob");

-- Below is the error for Foreign Key constraint in MovieActor Table

ERROR 1452 (23000) at line 41: Cannot add or update a child row: a foreign key constraint fails (`CS143`.`MovieActor`, CONSTRAINT `MovieActor_ibfk_2` FOREIGN KEY (`aid`) REFERENCES `Actor` (`id`) ON UPDATE CASCADE)




/*-- 7.  FOREIGN KEY Constraint violation on Review table by inserting review for movie id that does not exist in movie table
*/

INSERT INTO Review VALUES("Anupam","32-34-23",1,3,"Test");

-- Below is the error for Foreign Key constraint in Review Table

ERROR 1452 (23000) at line 47: Cannot add or update a child row: a foreign key constraint fails (`CS143`.`Review`, CONSTRAINT `Review_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `Movie` (`id`) ON UPDATE CASCADE)


/*-- 8. FOREIGN KEY Constraint violation on Director table by delete fromr director that exist, it will violate because MovieDirector table has record with that ID
*/

DELETE FROM Director where ID=2;

-- Below is the error for Foreign Key constraint deleting a row in Director Table when the same director does exist in MovieDirector Table

ERROR 1451 (23000) at line 52: Cannot delete or update a parent row: a foreign key constraint fails (`CS143`.`MovieDirector`, CONSTRAINT `MovieDirector_ibfk_2` FOREIGN KEY (`did`) REFERENCES `Director` (`id`) ON UPDATE CASCADE)



/*-- 9. FOREIGN KEY Constraint violation on Actor table by DELETING  ID for actor that exist in MovieActor table and MovieActor table is refrencing Actor table

*/

DELETE FROM Actor where ID=119;


-- Below is the error for Foreign Key constraint deleting a row in Actor when the same actor does exist in MovieActor Table

ERROR 1451 (23000) at line 57: Cannot delete or update a parent row: a foreign key constraint fails (`CS143`.`MovieActor`, CONSTRAINT `MovieActor_ibfk_2` FOREIGN KEY (`aid`) REFERENCES `Actor` (`id`) ON UPDATE CASCADE)

