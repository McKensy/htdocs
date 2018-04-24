create database if not exists movie2k;

use movie2k;

create table genre (
	gid integer auto_increment,
    genre varchar(16),
    primary key(gid)
);

create table user (
	uid integer auto_increment,
    username varchar(16),
    password varchar(512),
    primary key(uid)
);

create table movie (
    mid integer auto_increment,
    name varchar(64),
    subtitle varchar(192),
    description varchar(512),
    trailer varchar(192),
    genrefk integer,
    entrycreatorfk integer default NULL,
    primary key(mid),
	foreign key(genrefk) references genre(gid),
	foreign key(entrycreatorfk) references user(uid)
);

insert into genre values (1, 'Comedy'), (2, 'Horror'), (3, 'Sci-Fi'), (4, 'Animation');

insert into movie 
set name = 'Deadpool',
	subtitle = '8/10 Stars | 1h 48min | Action, Adventure, Comedy | 12 February 2016 (USA)',
	description = 'A fast-talking mercenary with a morbid sense of humor is subjected to a rogue experiment that leaves him with accelerated healing powers and a quest for revenge.',
	trailer = 'https://www.youtube-nocookie.com/embed/_Dc1JcdJl1Q?rel=0',
	genrefk = '1';
    
insert into movie 
set name = 'Get Out',
	subtitle = '7.7/10 Stars | 1h 44min | Horror, Mystery, Thriller | 24 February 2017 (USA)',
	description = 'A young African-American visits his white girlfriend''s parents for the weekend, where his simmering uneasiness about their reception of him eventually reaches a boiling point.',
	trailer = 'https://www.youtube-nocookie.com/embed/prscAXjME94?rel=0',
	genrefk = '2';
    
insert into movie 
set name = 'Star Wars: Episode VIII - The Last Jedi',
	subtitle = '7.4/10 Stars | 2h 32min | Action, Adventure, Fantasy | 15 December 2017 (USA)',
	description = 'Rey develops her newly discovered abilities with the guidance of Luke Skywalker, who is unsettled by the strength of her powers. Meanwhile, the Resistance prepares for battle with the First Order.',
	trailer = 'https://www.youtube-nocookie.com/embed/Q0CbN8sfihY?rel=0',
	genrefk = '3';
    
insert into movie 
set name = 'Spirited Away',
	subtitle = '8.6/10 Stars | 2h 5min | Animation, Adventure, Family | 20 July 2001 (Japan)',
	description = 'During her family''s move to the suburbs, a sullen 10-year-old girl wanders into a world ruled by gods, witches, and spirits, and where humans are changed into beasts.',
	trailer = 'https://www.youtube-nocookie.com/embed/gOSP8sm_NoQ?rel=0',
	genrefk = '4';


create user 'moviesql'@'localhost' identified by 'toor';
grant select, insert on movie2k.* to moviesql@localhost;
flush privileges;

select * from user;
insert ignore into user (username, password) values('hash4', 'yes');
INSERT INTO `movie` (`name`, `subtitle`, `description`, `trailer`, `genrefk`, `entrycreatorfk`) VALUES ('dass', 'dsad', 'dsadasd', 'addsa', '32132', 3, 10);
/*
(1,'Deadpool','8/10 Stars | 1h 48min | Action, Adventure, Comedy | 12 February 2016 (USA)','1953-04-01'),
(2,'Get Out','Müller','1982-09-28'),
(3,'Star Wars: Episode VIII - The Last Jedi','Deichel-Hurz','1948-09-29'),
(4,'Spirited Away','Rasterfahndung','1969-02-05');
*/
/*
drop table movie;
drop table genre;
drop table user;
drop database movie2k;
truncate movie;

drop user moviesql@localhost;
grant select, insert
on movie2k.*
to moviesql@localhost;


select name, subtitle, description, trailer from movie where mid = 4;
select username, password from user where username = 'boi' and password = '123';
*/