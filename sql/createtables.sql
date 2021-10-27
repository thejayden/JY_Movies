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

-- create table if not exists bookings
-- ( booking_id int unsigned not null auto_increment primary key,
--   movie_id int unsigned not null,
--   cinema_id int not null,
--   seats varchar(255) not null,
--   name varchar(255) not null,
--   email varchar(255) not null,
--   phone varchar(255) not null,
--   date date not null,
--   timeslot varchar(255) not null,
--   ticket_type varchar(255),

-- );

-- -- create table if not exists bookings_test
-- -- ( booking_id int unsigned not null auto_increment primary key,
-- --   movie_id int unsigned not null,
-- --   seats varchar(255) not null
-- -- );

-- create table if not exists tickets
-- ( tic_id int unsigned not null auto_increment primary key,
--   tic_type varchar(255) not null,
--   tic_price float not null
-- );

