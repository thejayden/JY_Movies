use moviesdb;

-- DECLARE @ImgPath AS VARCHAR(255);
-- set @imgPath := 'C:/Users/Acer/Desktop';
set @imgPath := 'C:/Users/Acer/Documents/School Subjects/Y4S1/IM4717 Web App Design/Project/JY_Movies/images/movie_poster';
-- set @teststr := CONCAT(@imgPath,'/shangchi.jpg');

insert into movies values
    (1 , "Venom: Let There Be Carnage", "Action", load_file(CONCAT(@imgPath,'/venom2.jpg')), "PG-13", 98, "English"),
    (2 , "Shang-Chi and the Legend of the Ten Rings", "Action/Fantasy", load_file(CONCAT(@imgPath,'/shangchi.jpg')), "PG-13", 132, "English"),
    (3 , "Sinkhole", "Comedy/Disaster", load_file(CONCAT(@imgPath,'/sinkhole.jpg')), "PG", 114, "Korean"),
    (4 , "My Country My Parents", "Drama", load_file(CONCAT(@imgPath,'/mcmp.jpg')), "NC-16", 156, "Mandarin");
    