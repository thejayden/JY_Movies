create table if not exists movies
( movie_id int unsigned not null auto_increment primary key,
  title varchar(255) not null,
  genre varchar(50) not null,
  image longblob not null,
  rating varchar(50) not null,
  duration int not null,
  language varchar(50) not null
);