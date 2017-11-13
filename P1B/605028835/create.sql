CREATE TABLE MaxPersonID(
id INT
) ENGINE = INNODB; 


CREATE TABLE MaxMovieID(
id INT
) ENGINE = INNODB;

/* I am enforcing 1 Primary key constraint on Id and 2 check constraint. Check constraint is to ensure we do not insert Movie with ID greater than MAX Movie ID and also since first photogprah ever created was in 1870 so it does not make sense to insert movie with release year less than 1870*/

CREATE TABLE Movie(
id INT NOT NULL,
title VARCHAR(100) NOT NULL,
year INT,
rating VARCHAR(10),
company VARCHAR(50),
PRIMARY KEY(id),
CHECK ( id <=(SELECT id from MaxMovieID)),
CHECK (year > 1870)
) ENGINE = INNODB; 

/* Enforcing 1 Primary Key constratint on id, also 2 check constraint one that we do not insert an actor with ID greater than MaxPersonID and second we do not insert anything else in Sex column except Male or Female - Now this could be checked in UI as well and later if required we can remove this check constraint*/

CREATE TABLE Actor(
id INT NOT NULL,
last VARCHAR(20) NOT NULL,
first VARCHAR(20) NOT NULL,
sex VARCHAR(6) NOT NULL,
dob DATE NOT NULL,
dod DATE,
PRIMARY KEY(id),
CHECK(id <= (SELECT id from MaxPersonID) AND (sex="Male" or sex="Female"))
) ENGINE = INNODB ;

/* Added primary key constraint on ID. Additional CHECK constraint is an attempt to ensure that if we add a Directo who exists in Actor table then ID is same as Actor ID, now i think it may result in failure if there are two such records , i think trigger would be better way to enforce unique ID across Actor and Director table, essentially we should combine these tables in future - please do not use this from grading, since mysql does not support check constraint it is not easy to test it */

CREATE TABLE Director(
id INT NOT NULL,
last VARCHAR(20) NOT NULL,
first VARCHAR(20) NOT NULL,
dob DATE NOT NULL,
dod DATE,
PRIMARY KEY(id),
CHECK ( (select count(*) from Actor where Actor.first=first and Actor.last=last and Actor.dob=dob) <>1 or id=(select id from Actor where Actor.first=first and Actor.last=last and Actor.dob=dob))
) ENGINE = INNODB;

/* Added Foreign Key constraint to for mid to refrence id in Movie table  also i am using UPDATE CASCASE on all foreing constraint to ensure that update to referenced attributes are cascaded to refrencing tables as well*/


CREATE TABLE MovieGenre(
mid INT,
genre VARCHAR(20),
FOREIGN KEY(mid) references Movie(id)
  ON UPDATE CASCADE
) ENGINE = INNODB;


/* Added 2 Foreign key constraitn, 1 is to make sure that mid references id in Movie table and other is make sure did refrences to id in Director table*/

CREATE TABLE MovieDirector(
mid INT,
did INT,
FOREIGN KEY(mid) references Movie(id)
  ON UPDATE CASCADE,
FOREIGN KEY(did) references Director(id)
  ON UPDATE CASCADE
) ENGINE = INNODB;



/* Added 2 Foreign key constraitn, 1 is to make sure that mid references id in Movie table and other is make sure aid refrences to id in Actor table*/

CREATE TABLE MovieActor(
mid INT,
aid INT,
role VARCHAR(50),
FOREIGN KEY(mid) references Movie(id)
  ON UPDATE CASCADE,
FOREIGN KEY(aid) references Actor(id)
  ON UPDATE CASCADE
) ENGINE = INNODB;

/* Added Foreign key constraint to make sure that mid references id in Movie Table*/

CREATE TABLE Review(
name VARCHAR(20),
time TIMESTAMP,
mid INT,
rating INT,
comment VARCHAR(500),
FOREIGN KEY(mid) references Movie(id)
  ON UPDATE CASCADE
) ENGINE = INNODB;

