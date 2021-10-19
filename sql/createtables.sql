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