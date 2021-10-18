use moviesdb;

-- DECLARE @ImgPath AS VARCHAR(255);
-- set @imgPath := 'C:/Users/Acer/Desktop';
-- set @imgPath := 'C:/xampp/htdocs/proj1/images/movie_poster';
set @imgPath := 'C:/Users/Acer/Documents/School Subjects/Y4S1/IM4717 Web App Design/Project/JY_Movies/images/movie_poster';
-- set @teststr := CONCAT(@imgPath,'/shangchi.jpg');

insert into movies values
    (1 , "Venom: Let There Be Carnage", "Action", load_file(CONCAT(@imgPath,'/venom2.jpg')), "PG-13", 98, "English");
    -- (2 , "Shang-Chi and the Legend of the Ten Rings", "Action/Fantasy", load_file(CONCAT(@imgPath,'/shangchi.jpg')), "PG-13", 132, "English"),
    -- (3 , "Sinkhole", "Comedy/Disaster", load_file(CONCAT(@imgPath,'/sinkhole.jpg')), "PG", 114, "Korean"),
    -- (4 , "My Country My Parents", "Drama", load_file(CONCAT(@imgPath,'/mcmp.jpg')), "NC-16", 156, "Mandarin"),
    -- (5 , "Free Guy", "Action/Adventure", load_file(CONCAT(@imgPath,'/freeguy.jpg')), "PG-13", 115, "English"),
    -- (6 , "Baby Boss", "Comedy/Family", load_file(CONCAT(@imgPath,'/bbyboss.jfif')), "PG", 107, "English"),
    -- (7 , "Raging Fire", "Action/Crime", load_file(CONCAT(@imgPath,'/fire.jpg')), "NC-16", 126, "Mandarin"),
    -- (8 , "No Time To Die", "Action/Adventure", load_file(CONCAT(@imgPath,'/nttd.jpg')), "NC-16", 163, "English"),
    -- (9 , "Don't Breathe", "Horror/Thriller", load_file(CONCAT(@imgPath,'/breathe2.jpg')), "R", 98, "English"),
    -- (10 , "Paw Patrol", "Comedy/Adventure", load_file(CONCAT(@imgPath,'/pawpatrol.jpg')), "NC-16", 88, "English");
    