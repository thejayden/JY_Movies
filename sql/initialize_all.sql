CREATE DATABASE IF NOT EXISTS moviesdb;

use moviesdb;

create table if not exists movies
( movie_id int unsigned not null auto_increment primary key,
  title varchar(255) not null,
  genre varchar(50) not null,
  image longblob not null,
  rating varchar(50) not null,
  duration int not null,
  language varchar(50) not null
);

create table if not exists movieinfo
( movie_id int unsigned not null auto_increment primary key,
  summary text not null,
  casts varchar(255) not null,
  director varchar(50) not null,
  released varchar(50) not null,
  producers varchar(255) not null,
  company varchar(50) not null,
  video varchar(255) not null,
  image1 longblob not null,
  image2 longblob not null,
  image3 longblob not null
);

create table if not exists bookings
( 
--   booking_id int unsigned not null auto_increment primary key,
  booking_id int(3) unsigned zerofill not null auto_increment primary key,
  movie_id int unsigned not null,
  cinema_id varchar(255) not null,
  seats varchar(255) not null,
  name varchar(255) not null,
  email varchar(255) not null,
  phone varchar(255) not null,
  date date not null,
  timeslot varchar(255) not null,
  ticket_type varchar(255) not null
);

create table if not exists tickets
( 
  tic_type varchar(255) not null primary key,
  tic_price float not null
);

create table if not exists cinemas
( 
  cinema_id varchar(255) not null primary key,
  cinema_name varchar(255) not null
);

set @imgPath := 'Z:/public_html/JY_Movies/images/movie_poster';

insert into movies values
    (1 , "Venom: Let There Be Carnage", "Action", load_file(CONCAT(@imgPath,'/venom2.jpg')), "PG-13", 98, "English"),
    (2 , "Shang-Chi and the Legend of the Ten Rings", "Action/Fantasy", load_file(CONCAT(@imgPath,'/shangchi.jpg')), "PG-13", 132, "English"),
    (3 , "Sinkhole", "Comedy/Disaster", load_file(CONCAT(@imgPath,'/sinkhole.jpg')), "PG", 114, "Korean"),
    (4 , "My Country My Parents", "Drama", load_file(CONCAT(@imgPath,'/mcmp.jpg')), "NC-16", 156, "Mandarin"),
    (5 , "Free Guy", "Action/Adventure", load_file(CONCAT(@imgPath,'/freeguy.jpg')), "PG-13", 115, "English"),
    (6 , "Baby Boss", "Comedy/Family", load_file(CONCAT(@imgPath,'/bbyboss.jfif')), "PG", 107, "English"),
    (7 , "Raging Fire", "Action/Crime", load_file(CONCAT(@imgPath,'/fire.jpg')), "NC-16", 126, "Mandarin"),
    (8 , "No Time To Die", "Action/Adventure", load_file(CONCAT(@imgPath,'/nttd.jpg')), "NC-16", 163, "English"),
    (9 , "Don't Breathe", "Horror/Thriller", load_file(CONCAT(@imgPath,'/breathe2.jpg')), "R", 98, "English"),
    (10 , "Paw Patrol", "Comedy/Adventure", load_file(CONCAT(@imgPath,'/pawpatrol.jpg')), "NC-16", 88, "English");
    
insert into tickets values
    ("Standard", 9.50),
    ("Platinum", 11.00),
    ("Gold", 13.50);

insert into cinemas values
    ("JY1", "JY Woodlands"),
    -- ("JY2", "JY Yishun"),
    -- ("JY3", "JY Jurong"),
    ("JY4", "JY Serangoon"),
    ("JY5", "JY Pasir Ris"),
    ("JY6", "JY Sengkang"),
    ("JY7", "JY Orchard"),
    ("JY8", "JY Boon Keng"),
    ("JY9", "JY Lavender"),
    ("JY10", "JY Farrer Park");